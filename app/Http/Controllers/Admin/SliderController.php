<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero_sub_title'   => 'required',
            'hero_title'       => 'required',
            'image'            => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload ảnh
        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'hero_sub_title'   => $request->hero_sub_title,
            'hero_title'       => $request->hero_title,
            'hero_description' => $request->hero_description,
            'btn1_text'        => $request->btn1_text,
            'btn1_link'        => $request->btn1_link,
            'btn2_text'        => $request->btn2_text,
            'btn2_link'        => $request->btn2_link,
            'image'            => $imagePath,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider added successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'hero_sub_title'   => 'required',
            'hero_title'       => 'required',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            $slider->image = $imagePath;
        }

        $slider->update([
            'hero_sub_title'   => $request->hero_sub_title,
            'hero_title'       => $request->hero_title,
            'hero_description' => $request->hero_description,
            'btn1_text'        => $request->btn1_text,
            'btn1_link'        => $request->btn1_link,
            'btn2_text'        => $request->btn2_text,
            'btn2_link'        => $request->btn2_link,
            'image'            => $slider->image,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
