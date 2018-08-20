<?php

namespace App\Http\Controllers\User;

use App\Model\user\presentation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PresentationController extends Controller
{



    public function __construct()
    {
        $this->middleware('guest',['except' => ['presentation']]);

    }

    /**
     * Show the testimonials page
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $presentations= DB::table('presentations')
            //->join('shopcategories','presentations.category_id','=','shopcategories.category_id')

            ->join('colors','presentations.color_id','=','colors.id')

            ->select('presentations.*','colors.color_slug')
            ->where('presentations.status',1)
            ->orderBy('created_at','DESC')
            ->get();


        return view('auth.register',compact('presentations'));

    }


 //public function presentation(presentation $presentation)
 //{

 //    return view('site.page.presentation',compact('presentation'));
 //}


    public function presentation($presentation)
    {

        $presentation= DB::table('presentations')


            ->join('colors','presentations.color_id','=','colors.id')
            ->select('presentations.*','colors.color_slug')
            ->where('presentations.slug',$presentation)
            ->where('presentations.status',1)
            ->first();

        return view('site.page.presentation',compact('presentation'));

    }
}
