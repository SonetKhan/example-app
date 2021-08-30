<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;

class AboutController extends Controller
{
    public function about(){

        $homeAbouts = HomeAbout::latest()->get();

        return view('admin.about.index',compact('homeAbouts'));
    }

    public function addAbout(){

        return view('admin.about.create');
    }
    public function storeAbout(Request $request){
        $aboutValidate = $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required'
        ],[
            'title.required'=>'You must fill up title field',
            'short_desc.required'=>'You must fill up short description',
            'long_desc.required'=>'you must fill up long description'
        ]);
        $about = new HomeAbout();

        $about->title = $request->title;

        $about->short_desc = $request->short_desc;

        $about->long_desc = $request->long_desc;

        $about->save();

        return redirect()->route('home.about')->with('success','About section inserted successfully');

    }
    public function editAbout(Request $request,$id){

        $about = HomeAbout::find($id);

        return view('admin.about.edit',compact('about'));

    }
    public function updateAbout(Request $request,$id){

        $updateValidate = $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required'

        ]);

        $updateAbout = HomeAbout::find($id);

        $updateAbout->title = $request->title;

        $updateAbout->short_desc = $request->short_desc;

        $updateAbout->long_desc = $request->long_desc;

        $updateAbout->save();

        return redirect()->route('home.about')->with('success','Data updated successfully');

    }
    public function aboutDelete($id){

        HomeAbout::find($id)->delete();

        return redirect()->route('home.about')->with('success','Data Deleted successfully');

    }
}
