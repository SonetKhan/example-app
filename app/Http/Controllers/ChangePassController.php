<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function changePassword(){

        return view('admin.body.change_password');
    }

    public function updatePassword(Request $request){

        $validateData = $request->validate([
            'current_password'=>'required',
            'change_password'=>'required|confirm'

        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){

            $user = User::find(Auth::id());

            $user->password = Hash::make($request->change_password);

            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Your password changed successfully');



        }
        else{
            return redirect()->back()->with('error','Current password is invalid');
        }
    }
}
