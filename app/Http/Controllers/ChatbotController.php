<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\Car;
use App\Models\CompanyProfile;

class ChatbotController extends Controller
{
    private $cacheTime = 3600; // 1 hour cache

    public function sendMessage(Request $request)
    {
        try {
            // Rate limiting: 60 requests per minute
            if (!$this->checkRateLimit($request)) {
                return response()->json(['reply' => 'Xin lỗi, bạn đang gửi quá nhiều yêu cầu. Vui lòng thử lại sau.'], 429);
            }

            $message = $request->input('message');

            if (!$message) {
                return response()->json(['reply' => 'Xin hãy nhập nội dung!'], 400);
            }

            // Cache key based on message content
            $cacheKey = 'chatbot_response_' . md5($message);

            // Try to get response from cache
            if ($cachedResponse = Cache::get($cacheKey)) {
                return response()->json(['reply' => $cachedResponse]);
            }

            $message = strtolower($message);

            // Get car and company data
            $cars = Cache::remember('all_cars', $this->cacheTime, function () {
                return Car::with('brand')->get();
            });

            $company = Cache::remember('company_info', $this->cacheTime, function () {
                return CompanyProfile::first();
            });

            // Format car data - only include requested fields
            $carData = $cars->map(function ($car) use ($message) {
                $data = [];

                // Only include name if asked about car names/models
                if (str_contains($message, 'tên') || str_contains($message, 'mẫu xe')) {
                    $data['name'] = $car->name;
                }

                // Only include brand if asked about manufacturers/brands
                if (str_contains($message, 'hãng') || str_contains($message, 'thương hiệu')) {
                    $data['brand'] = $car->brand->name ?? 'Không rõ';
                }

                // Only include price if asked about costs/prices
                if (str_contains($message, 'giá') || str_contains($message, 'chi phí')) {
                    $data['price'] = number_format($car->price, 0, ',', '.') . " VNĐ";
                }

                // Include link if specifically asked or if showing detailed info
                if (str_contains($message, 'link') || str_contains($message, 'chi tiết')) {
                    $data['link'] = rtrim(env('APP_URL'), '/') . "/car/{$car->id}";
                }

                return !empty($data) ? $data : null;
            })->filter();

            // Format company data - only include requested fields
            $companyData = null;
            if ($company) {
                $companyData = [];

                if (str_contains($message, 'tên công ty')) {
                    $companyData['name'] = $company->name;
                }
                if (str_contains($message, 'địa chỉ')) {
                    $companyData['address'] = $company->address;
                }
                if (str_contains($message, 'điện thoại') || str_contains($message, 'liên hệ')) {
                    $companyData['phone'] = $company->phone;
                }
                if (str_contains($message, 'email')) {
                    $companyData['email'] = $company->email;
                }
                if (str_contains($message, 'website')) {
                    $companyData['website'] = $company->website;
                }
                if (str_contains($message, 'giới thiệu') || str_contains($message, 'thông tin')) {
                    $companyData['description'] = $company->description;
                }

                if (empty($companyData)) {
                    $companyData = null;
                }
            }

            // Call OpenAI API with context
            $openaiResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "Bạn là một trợ lý AI hữu ích, chuyên trả lời các câu hỏi về ô tô và thông tin công ty. Hãy trả lời ngắn gọn, thân thiện và chuyên nghiệp. Dưới đây là dữ liệu về xe và công ty:\n" .
                            "CARS: " . json_encode($carData, JSON_UNESCAPED_UNICODE) . "\n" .
                            "COMPANY: " . json_encode($companyData, JSON_UNESCAPED_UNICODE)
                    ],
                    [
                        'role' => 'user',
                        'content' => $message
                    ]
                ],
                'max_tokens' => 500,
                'temperature' => 0.7,
            ]);

            if ($openaiResponse->successful()) {
                $response = $openaiResponse->json()['choices'][0]['message']['content'];
            } else {
                $response = 'Xin lỗi, có lỗi xảy ra khi xử lý yêu cầu của bạn. Vui lòng thử lại sau.';
            }

            // Cache the response
            Cache::put($cacheKey, $response, $this->cacheTime);

            return response()->json(['reply' => $response]);
        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    private function checkRateLimit(Request $request)
    {
        $key = 'chatbot_rate_limit_' . $request->ip();
        $requests = (int) Cache::get($key, 0);

        if ($requests >= 60) {
            return false;
        }

        Cache::put($key, $requests + 1, 60);
        return true;
    }
}
