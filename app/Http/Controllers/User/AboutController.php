<?php

namespace App\Http\Controllers\User;

use App\Model\user\about;
use App\Model\user\presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    /**
     * Show the testimonials page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = presentation::all();
        $abouts = About::orderBy('created_at','DESC')->get();

        return view('site.page.about',compact('abouts','presentations'));
    }



}
