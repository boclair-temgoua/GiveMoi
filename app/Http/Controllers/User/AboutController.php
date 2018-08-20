<?php

namespace App\Http\Controllers\User;

use App\Model\user\about;
use App\Model\user\presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    /**
     * Show the testimonials page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::where('status',1)->orderBy('created_at','DESC')->get();
        $presentations= DB::table('presentations')
            //->join('shopcategories','presentations.category_id','=','shopcategories.category_id')

            ->join('colors','presentations.color_id','=','colors.id')

            ->select('presentations.*','colors.color_slug')
            ->where('presentations.status',1)
            ->orderBy('created_at','DESC')
            ->get();



        return view('site.page.about',compact('abouts','presentations'));

    }



}
