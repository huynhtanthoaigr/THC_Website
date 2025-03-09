<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first(); // Lấy thông tin công ty từ database
        return view('user.contact.index', compact('company'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Gửi thông tin liên hệ thành công!');
    }
    public function reply(Request $request, $id)
{
    $request->validate([
        'reply' => 'required|string|min:5',
    ]);

    $message = ContactMessage::findOrFail($id);
    $message->update(['reply' => $request->reply]);

    return redirect()->route('admin.contact.index')->with('success', 'Đã gửi phản hồi!');
}
}
