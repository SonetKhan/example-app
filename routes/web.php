<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////////////////////....For Email Verification...... ///////////////////////////////


//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $aboutDetails = DB::table('home_abouts')->get();
    $multiImages = DB::table('multi_pics')->get();
    return view('home',compact('brands','aboutDetails','multiImages'));
});

Route::get('/about',function(){

    return view('about');
});



Route::get('/index',[contactController::class,'index'])->name('contact');

Route::get('/home',function(){

    echo "this is home page";
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//    $users = User::all();

//    $users = DB::table('users')->get();

    return view('admin.index');

})->name('dashboard');

/*
|--------------------------------------------------------------------------
|Category controller
|--------------------------------------------------------------------------
*/


Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all.category');

Route::post('/category/add',[CategoryController::class,'addCategory'])->name('add.category');

Route::get('/category/edit/{id}',[CategoryController::class,'editCategory']);

Route::post('/category/update/{id}',[CategoryController::class,'updateCategory']);

Route::get('/category/softDelete/{id}',[CategoryController::class,'softDelete']);

Route::get('/category/restore/{id}',[CategoryController::class,'restoreCategory']);

Route::get('/category/permanentDelete/{id}',[CategoryController::class,'permanentDelete']);

/*
|--------------------------------------------------------------------------
|Brand controller
|--------------------------------------------------------------------------
*/

Route::get('/brand/all',[BrandController::class,'allBrand'])->name('all.brand');

Route::post('/brand/add',[BrandController::class,'addBrand'])->name('add.brand');

Route::get('/brand/edit/{id}',[BrandController::class,'editBrand']);

Route::post('/brand/update/{id}',[BrandController::class,'updateBrand']);

Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);

/*
|--------------------------------------------------------------------------
|For Multiple Images
|--------------------------------------------------------------------------
*/


Route::get('/multi/image',[BrandController::class,'multiPic'])->name('multi.image');

Route::post('/multi/image/store',[BrandController::class,'storeImage'])->name('store.image');

/*
|--------------------------------------------------------------------------
| Login || Logout route
|--------------------------------------------------------------------------
*/

Route::get('user/logout',[BrandController::class,'Logout'])->name('user.logout');



/*
|--------------------------------------------------------------------------
| Admin All route
|--------------------------------------------------------------------------
*/
Route::get('/home/slider',[HomeController::class,'homeSlider'])->name('home.slider');

Route::get('/home/add/slider',[HomeController::class,'addSlider'])->name('add.slider');

Route::post('/home/store/slider',[HomeController::class,'storeSlider'])->name('store.slider');

/*
|--------------------------------------------------------------------------
| Home About All route
|--------------------------------------------------------------------------
*/
Route::get('/home/about',[AboutController::class,'about'])->name('home.about');

Route::get('home/about/add',[AboutController::class,'addAbout'])->name('add.about');

Route::post('home/about/store',[AboutController::class,'storeAbout'])->name('store.about');

Route::get('home/about/edit/{id}',[AboutController::class,'editAbout']);

Route::post('home/about/update/{id}',[AboutController::class,'updateAbout'])->name('update.about');

Route::get('home/about/delete/{id}',[AboutController::class,'aboutDelete']);

/*
|--------------------------------------------------------------------------
| Portfolio routes for frontend
|--------------------------------------------------------------------------
*/

Route::get('/portfolio',[PortfolioController::class,'portfolioDetails'])->name('portfolio');
/*
|--------------------------------------------------------------------------
| Contact page route
|--------------------------------------------------------------------------
*/
Route::get('/admin/contact',[contactController::class,'adminContact'])->name('admin.contact');

Route::get('/admin/contact/add',[contactController::class,'addContact'])->name('add.contact');

Route::post('admin/contact/store',[contactController::class,'storeContact'])->name('store.contact');

Route::get('/home/contact',[contactController::class,'contactDetails'])->name('contact');

Route::post('/home/contact/message',[contactController::class,'contactMessage'])->name('contact.message');

Route::get('/admin/contact/message',[contactController::class,'adminMessage'])->name('admin.message');

Route::get('/admin/message/delete/{id}',[contactController::class,'adminMessageDelete']);

/*
|--------------------------------------------------------------------------
| Change Password Route And User Profile route
|--------------------------------------------------------------------------
*/

Route::get('/user/password',[\App\Http\Controllers\ChangePassController::class,'changePassword'])->name('change.password');

Route::post('/user/password/update',[\App\Http\Controllers\ChangePassController::class,'updatePassword'])->name('password.update');

