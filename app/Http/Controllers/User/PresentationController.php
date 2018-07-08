<?php

namespace App\Http\Controllers\User;

use App\Model\user\presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresentationController extends Controller
{
    /**
     * Show the testimonials page
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $presentations = Presentation::orderBy('created_at','DESC')->get();
        return view('auth.register',compact('presentations'));
    }

    public function presentation(presentation $presentation)
    {

        return view('site.page.presentation',compact('presentation'));
    }
}
