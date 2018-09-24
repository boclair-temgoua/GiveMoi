<?php

namespace App\Http\Controllers\User;

use App\Model\user\partial\slides\slidestestimonial;
use App\Model\user\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{

    /**
     * Show the testimonials page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slidestestimonials = Slidestestimonial::where('status',1)->orderBy('created_at','DESC')->get();
        $testimonials = Testimonial::where('status',1)->orderBy('created_at','DESC')->get();

        return view('site.page.testimonial',compact('testimonials','slidestestimonials'));
    }
}
