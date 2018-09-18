<?php

namespace App\Http\Controllers\User;

use App\Model\user\about;
use App\Model\user\partial\speciality;
use App\Model\user\partial\work;
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
        $specialities = Speciality::where('status',1)->orderBy('created_at')->get();
        $abouts = About::where('status',1)->orderBy('created_at','DESC')->get();
        $presentations= DB::table('presentations')
            //->join('shopcategories','presentations.category_id','=','shopcategories.category_id')

            ->join('colors','presentations.color_id','=','colors.id')

            ->select('presentations.*','colors.color_slug')
            ->where('presentations.status',1)
            ->orderBy('created_at','DESC')
            ->get();



        return view('site.page.about',compact('abouts','presentations','specialities'));

    }


    public function save_work(Request $request)
    {
        //dd(\request()->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'speciality_id' => 'required',
        ]);



        $work = Work::create($request->except('speciality'));
        $work->save();


        //alert()->success('Success', "Role has ben created successfully");
        toastr()->success('<b>Good Job !</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }



}
