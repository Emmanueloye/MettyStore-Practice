<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.products.slider', compact('sliders'));
    }

    public function addSlider(Request $request)
    {
        $request->validate([
            'slider_img' => 'required|image|mimes:jpg,jpeg,png,svg,gif'
        ], [
            'slider_img.required' => 'The slider image field is required.',
            'slider_img.image' => 'The slider image field must be an image.',
            'slider_img.mimes' => 'The slider image must be a file of type: jpg, jpeg, png, svg, gif.'
        ]);

        $sliderImage = $request->file('slider_img');
        $imageName = time() . $sliderImage->getClientOriginalName();
        Image::make($sliderImage)->resize(960, 640)->save('upload/slider/' . $imageName);
        $savedPath = 'upload/slider/' . $imageName;

        $newSlider = new Slider();
        $newSlider->slider_title = $request->slider_title;
        $newSlider->slider_desc = $request->slider_desc;
        $newSlider->slider_img = $savedPath;
        $newSlider->save();

        return redirect()->back();
    }

    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.products.slider-edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            'slider_img' => 'image|mimes:jpg,jpeg,png,svg,gif'
        ], [
            'slider_img.image' => 'The slider image field must be an image.',
            'slider_img.mimes' => 'The slider image must be a file of type: jpg, jpeg, png, svg, gif.'
        ]);

        $sliderImage = $request->file('slider_img');
        $oldImage = $request->old_image;

        $slider = Slider::findOrFail($id);
        $slider->slider_title = $request->slider_title;
        $slider->slider_desc = $request->slider_desc;
        if ($sliderImage) {
            unlink($oldImage);
            $imageName = time() . $sliderImage->getClientOriginalName();
            Image::make($sliderImage)->resize(960, 640)->save('upload/slider/' . $imageName);
            $savedPath = 'upload/slider/' . $imageName;
            $slider->slider_img = $savedPath;
        }
        $slider->save();

        return redirect()->route('slider');
    }

    public function deactivateSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 0;
        $slider->save();

        return redirect()->back();
    }

    public function activateSlider($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 1;
        $slider->save();

        return redirect()->back();
    }

    public function deleteSlider($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);
        $slider->delete();

        return redirect()->back();
    }

    // Why choose us section functions

    public function valueView()
    {
        $values = CoreValue::latest()->get();
        return view('backend.products.value', compact('values'));
    }

    public function addNewSlide(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'image_path' => 'required|image|mimes:jpg,jpeg,png,svg,gif'
        ], [
            'short_desc.required' => 'The short description field is required.'
        ]);

        $imageFile = $request->file('image_path');
        $imageName = time() . $imageFile->getClientOriginalName();
        Image::make($imageFile)->resize(400, 400)->save('upload/value/' . $imageName);
        $savedPath = 'upload/value/' . $imageName;

        $value = new CoreValue();
        $value->title = $request->title;
        $value->short_desc = $request->short_desc;
        $value->image_path = $savedPath;
        $value->status = 1;
        $value->save();

        return redirect()->back();
    }

    public function editValue($id)
    {
        $value = CoreValue::findOrFail($id);
        return view('backend.products.value-edit', compact('value'));
    }

    public function updateValue(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'image_path' => 'image|mimes:jpg,jpeg,png,svg,gif'
        ], [
            'short_desc.required' => 'The short description field is required.'
        ]);

        $value = CoreValue::findOrFail($id);
        $value->title = $request->title;
        $value->short_desc = $request->short_desc;
        $value->status = 1;
        $imageFile = $request->file('image_path');
        $oldImage = $request->old_image;
        if ($imageFile) {
            unlink($oldImage);
            $imageName = time() . $imageFile->getClientOriginalName();
            Image::make($imageFile)->resize(400, 400)->save('upload/value/' . $imageName);
            $savedPath = 'upload/value/' . $imageName;
            $value->image_path = $savedPath;
        }

        $value->save();
        return redirect()->route('value');
    }

    public function deactivateValue($id)
    {
        $value = CoreValue::findOrFail($id);
        $value->status = 0;
        $value->save();

        return redirect()->back();
    }

    public function activateValue($id)
    {
        $value = CoreValue::findOrFail($id);
        $value->status = 1;
        $value->save();

        return redirect()->back();
    }
}
