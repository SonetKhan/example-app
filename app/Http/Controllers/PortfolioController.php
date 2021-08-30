<?php

namespace App\Http\Controllers;

use App\Models\MultiPic;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function portfolioDetails(){
        $multiImages = MultiPic::all();
        return view('pages.portfolio',compact('multiImages'));
    }
}
