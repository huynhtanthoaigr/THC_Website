<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Car;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['reply' => 'Xin hãy nhập nội dung!'], 400);
        }

        $apiKey = env('OPENAI_API_KEY');

        // Lấy danh sách xe từ DB
        $cars = Car::with('brand')->get();

        // Chuyển thành danh sách Markdown có thể click được
        $carList = $cars->map(function ($car) {
            return [
                'name' => $car->name,
                'brand' => $car->brand->name ?? 'Không rõ',
                'price' => number_format($car->price, 0, ',', '.') . " VNĐ",
                'link' => "https://127.0.0.1:8000/car/{$car->id}"
            ];
        });

        $carListFormatted = collect($carList)->map(fn ($car) => 
            "🔹 **{$car['name']}** - Hãng: {$car['brand']} - Giá: {$car['price']}  \n👉 [Xem chi tiết]({$car['link']})"
        )->implode("\n\n");

        $systemMessage = "Bạn là trợ lý tư vấn xe hơi. Dưới đây là danh sách xe hiện có:\n\n" . $carListFormatted . 
            "\n\nHãy sử dụng danh sách này để tư vấn khách hàng. Luôn cung cấp link theo dạng Markdown để có thể click vào.";

        // Gửi request đến OpenAI
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemMessage],
                ['role' => 'user', 'content' => $message]
            ],
            'temperature' => 0.7,
        ]);

        if ($response->failed()) {
            return response()->json(['reply' => 'Xin lỗi, tôi không thể trả lời ngay bây giờ.'], 500);
        }

        $data = $response->json();
        return response()->json(['reply' => $data['choices'][0]['message']['content']]);
    }
}
