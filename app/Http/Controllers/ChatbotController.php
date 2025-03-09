<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['reply' => 'Xin hãy nhập nội dung!'], 400);
        }

        $apiKey = env('OPENAI_API_KEY'); // Lấy API key từ file .env

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [['role' => 'user', 'content' => $message]],
        ]);

        if ($response->failed()) {
            return response()->json(['reply' => 'Xin lỗi, tôi không thể trả lời ngay bây giờ.'], 500);
        }

        $data = $response->json();
        return response()->json(['reply' => $data['choices'][0]['message']['content']]);
    }
}
