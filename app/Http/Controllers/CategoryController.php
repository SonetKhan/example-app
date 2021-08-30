<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }


    public function allCategory(){

        //.....For get data with Asc

        $categoriesData = Category::latest()->paginate(5);

        $categoriesTrashed = Category::onlyTrashed()->latest()->paginate(3);



        //..........Get Data using query builder....

        //$categoriesData = DB::table('categories')->latest()->paginate(5);

        //......Get data using query builder and Joining query

//        $categoriesData = DB::table('categories')
//            ->join('users','categories.user_id','users.id')
//            ->select('categories.*','users.name')
//            ->latest()->paginate(5);

        return view('admin.category.index',compact('categoriesData','categoriesTrashed'));

    }
    public function addCategory(Request $request){

        $validated = $request->validate([

            'category_name' => 'required|unique:categories|max:255',

        ],
        [
            'category_name.required'=>'Please input the category filled'

        ]);
//
//        Category::insert([
//            'category_name'=>$request->category_name,
//            'user_id'=>Auth::user()->id,
//            'created_at'=>Carbon::now()
//        ]);


        //....Preferable and professional format

//        $category = new Category();
//        $category->category_name = $request->category_name;
//        $category->user_id = Auth::user()->id;
//        $category->save();

        //....using query builder.....

        $data = array();

        $data['category_name']=$request->category_name;

        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->insert($data);

    return redirect()->back()->with('success','category inserted successfully');

    }
    public function editCategory($id){

//        $categoryData = Category::find($id);

        //.......Using query builder..
        $categoryData = DB::table('categories')->whereId($id)->first();

        return view('admin.category.edit',compact('categoryData'));

    }
    public function updateCategory(Request $request,$id){

//        $updateData = Category::find($id)->update([
//
//            'category_name'=> $request->category_name,
//
//            'user_id'=>Auth::user()->id
//        ]);
        //....Using query Builder

        $data = array();

        $data['category_name'] = $request->category_name;

        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->whereId($id)->update($data);


        return redirect()->route('all.category')->with('success','category Updated successfully');

    }

    public function softDelete($id){

        $deleteData = Category::find($id)->delete();

        return redirect()->back()->with('success','Category soft deleted successfully');

    }

    public function restoreCategory($id){

        $restoreData = Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success','Category restored successfully');
    }

    public function permanentDelete($id){

        $deleteData = Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success','Category Delete  successfully');

    }
}
