<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\Car;

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

            $apiKey = env('OPENAI_API_KEY');
            if (!$apiKey) {
                throw new \Exception('OpenAI API key not configured');
            }

            // Cache key based on message content
            $cacheKey = 'chatbot_response_' . md5($message);

            // Try to get response from cache
            if ($cachedResponse = Cache::get($cacheKey)) {
                return response()->json(['reply' => $cachedResponse]);
            }

            // Get all cars with eager loading and cache them
            $cars = Cache::remember('all_cars', $this->cacheTime, function () {
                return Car::with('brand')->get();
            });

            // Filter cars based on user message
            $message = strtolower($message);
            $filteredCars = $cars->filter(function ($car) use ($message) {
                return str_contains(strtolower($car->brand->name), $message) ||
                    str_contains(strtolower($car->name), $message);
            });

            if ($filteredCars->isEmpty()) {
                $carList = $cars;
            } else {
                $carList = $filteredCars;
            }

            // Format car list
            $carList = $carList->map(function ($car) {
                return [
                    'name' => $car->name,
                    'brand' => $car->brand->name ?? 'Không rõ',
                    'price' => number_format($car->price, 0, ',', '.') . " VNĐ",
                    'link' => env('APP_URL') . "/car/{$car->id}"
                ];
            });

            $carListFormatted = collect($carList)->map(
                fn($car) =>
                "<div class='car-item'>
                    <span>🔹 <strong>{$car['name']}</strong> - Hãng: {$car['brand']} - Giá: {$car['price']}</span>
                    <br>
                    <a href='{$car['link']}' class='car-link' onclick='window.open(this.href, \"_blank\"); return false;'>👉 Xem chi tiết</a>
                </div>"
            )->implode("\n");

            // Custom response based on user input
            $systemMessage = "You are a helpful seller car assistant.";
            $userMessage = $message . "\n\nDanh sách xe phù hợp:\n" . $carListFormatted;

            // Call OpenAI API
            $openAIResponse = $this->sendOpenAIRequest($apiKey, $systemMessage, $userMessage);

            // Check for errors in the OpenAI response
            if ($openAIResponse->failed()) {
                throw new \Exception('Failed to get response from OpenAI');
            }

            $botReply = $openAIResponse->json()['choices'][0]['message']['content'] ?? 'Xin lỗi, tôi không thể trả lời lúc này.';

            // Convert URLs to clickable links, but ignore already encoded URLs and existing links
            $botReply = preg_replace_callback(
                '/https?:\/\/(?![^<]*>|[^<>]*<\/)[^\s<]+/i',
                function ($matches) {
                    $url = html_entity_decode($matches[0]);
                    return "<a href=\"{$url}\" onclick=\"window.open(this.href, '_blank'); return false;\">{$url}</a>";
                },
                $botReply
            );

            // Cache the bot reply
            Cache::put($cacheKey, $botReply, $this->cacheTime);

            return response()->json(['reply' => $botReply]);
        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    private function sendOpenAIRequest($apiKey, $systemMessage, $userMessage)
    {
        return Http::timeout(15)->withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemMessage],
                ['role' => 'user', 'content' => $userMessage]
            ],
            'temperature' => 0.7,
            'max_tokens' => 1000,
        ]);
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
