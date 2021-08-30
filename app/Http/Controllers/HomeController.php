<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    public function homeSlider(){

        $sliders = Slider::latest()->get();

        return view('admin.slider.index',compact('sliders'));
    }
    public function addSlider(){

        return view('admin.slider.create');
    }
    public function storeSlider(Request $request){

       $validateData = $request->validate([
        'title'=>'required|unique:sliders|min:4',
           'description'=>'required',
           'image'=>'required|mimes:png,jpg,jpeg'

       ]);

       $sliderImage = $request->file('image');

        $uniqueNumberGenerator = hexdec(uniqid());

       $imageExtension = strtolower($sliderImage->getClientOriginalExtension());

       $imageName = $uniqueNumberGenerator.'.'.$imageExtension;

       $uploadImage = 'image/slider/'.$imageName;

//        Image::make($sliderImage)->resize(1920,1088)->save('image/slider',$imageName);
        \Intervention\Image\Facades\Image::make($sliderImage)->resize(1920,1088)->save('image/slider/'.$imageName,80);

        $slider = new Slider();

        $slider->title=$request->title;

        $slider->description = $request->description;

        $slider->image = $uploadImage;

        $slider->save();

       return redirect()->route('home.slider')->with('success','Slider added successfully');





    }
}
