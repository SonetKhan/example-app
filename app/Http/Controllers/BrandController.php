<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPic;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class BrandController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function allBrand(){

        $brands = Brand::latest()->paginate(5);

        return view('admin.brand.index',compact('brands'));
    }
    public function addBrand(Request $request){

        $validateData = $request->validate([
            'brand_name'=> 'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpeg,jpg.jpeg,png',
        ],[
            'brand_name.required'=>'Please input Valid brand name',
            'brand_name.min'=>'Brand name should be minimum 4 character',
            'brand_image.required'=>'Please input valid image'
        ]);

        $brandImage = $request->file('brand_image');
        $imageName = hexdec(uniqid()).'.'.strtolower($brandImage->getClientOriginalExtension());



        Image::make($brandImage)->resize(400,173)->save('image/brand/'. $imageName);

        $uploadedImage = 'image/brand/'.$imageName;

        $brand = new Brand();

        $brand->brand_name = $request->brand_name;

        $brand->brand_image = $uploadedImage;

        $brand->save();
        
        return redirect()->back()->with('success','Brand image inserted successfully');

//      $uniqueNumberGenerator = hexdec(uniqid());
//
//      $imageExtension = strtolower($brandImage->getClientOriginalExtension());
//
//      $imageName = $uniqueNumberGenerator.'.'.$imageExtension;
//
//
//      $uploadLocation = 'image/brand/';
//
//      $uploadedImage = $uploadLocation.$imageName;





//      $brandImage->move($uploadLocation,$imageName);



//        Brand::insert([
//            'brand_name'=>$request->brand_name,
//            'brand_image'=>$uploadedImage,
//            'created_at'=>Carbon::now()
//        ]);



}
    public function editBrand($id){

       $editData =  Brand::find($id);

         return view('admin.brand.edit',compact('editData'));

    }
    public function updateBrand(Request $request,$id){

        $validateData = $request->validate([
            'brand_name'=> 'required|min:4'

        ],[
            'brand_name.required'=>'Please input Valid brand name',
            'brand_name.min'=>'Brand name should be minimum 4 character'

        ]);

        $old_image = $request->old_image;

        $brandImage = $request->file('brand_image');

        if($brandImage){

            $uniqueNumberGenerator = hexdec(uniqid());

            $imageExtension = strtolower($brandImage->getClientOriginalExtension());

            $imageName = $uniqueNumberGenerator.'.'.$imageExtension;


            $uploadLocation = 'image/brand/';

            $uploadedImage = $uploadLocation.$imageName;



            $brandImage->move($uploadLocation,$imageName);

            unlink($old_image);

//         $brand = Brand::find($id);
//
//
//
//        $brand->brand_name = $request->brand_name;
//
//        $brand->brand_image = $uploadedImage;
//
//        $brand->save();

            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$uploadedImage,
                'created_at'=>Carbon::now()
            ]);

            return redirect(route('all.brand'))->with('success','Brand image updated successfully');

        }else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()
            ]);

            return redirect(route('all.brand'))->with('success','Brand image updated successfully');
        }

    }
    public function deleteBrand($id){

        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        return redirect()->route('all.brand')->with('success','Brand image delete successfully');

    }
    ////////.......Multi image all method.......here........

        public function multiPic(){

         $images = MultiPic::all();

        return view('admin.multipic.index',compact('images'));
        }

        public function storeImage(Request $request){

//            $validateData = $request->validate([
//
//                'image'=>'required|mimes:jpeg,jpg.jpeg,png',
//            ],[
//                'image.required'=>'Please upload multiple image'
//            ]);

            $images = $request->file('image');



            foreach($images as $image){



            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();



            Image::make($image)->resize(300,300)->save('image/multi/'. $imageName);

            $uploadedImage = 'image/multi/'.$imageName;

            $multi = new MultiPic();



            $multi->image = $uploadedImage;

                $multi->save();
            }// end 0f the foreach
            return redirect()->back()->with('success','Brand image inserted successfully');

        }

        public function Logout(){

        Auth::logout();

        return Redirect()->route('login')->with('success','You have successfully logout!');

}
}
