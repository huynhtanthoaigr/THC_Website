<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Hiển thị danh sách tin nhắn
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // Xem nội dung chi tiết của tin nhắn
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Đánh dấu tin nhắn là đã đọc
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    // Xóa tin nhắn
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Tin nhắn đã được xóa!');
    }
}
