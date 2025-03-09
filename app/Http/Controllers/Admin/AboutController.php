<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first() ?? new About(); // Tránh null
        return view('admin.about.index', compact('about'));
    }

    public function edit()
{
    $about = About::first() ?? new About();
    return view('admin.about.edit', compact('about'));
}

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sub_content_1' => 'nullable|string|max:255',
            'sub_content_2' => 'nullable|string|max:255',
            'sub_content_3' => 'nullable|string|max:255',
            'sub_content_4' => 'nullable|string|max:255',
            'sub_content_5' => 'nullable|string|max:255',
        ]);

        $about = About::firstOrCreate([]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $about->image = $imagePath;
        }

        $about->update($request->except('image'));
        return redirect()->route('admin.about.index')->with('success', 'About updated successfully');
    }
}
