<?php

namespace App\Http\Controllers\Admin\Partials;

use App\Model\user\partial\work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllWork()
    {
        //$works = Work::orderBy('updated_at','desc')->get();

      $works= DB::table('works')

          ->join('specialities','works.speciality_id','=','specialities.id')
          ->select('works.*','specialities.speciality_name')
          ->orderBy('updated_at','DESC')->get();

        return view('admin.partials.contact.show_work',compact('works'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_work(Request $request)
    {

        $work = Work::findOrFail($request->work_id);
        $work->delete();


        toastr()->success('<b>Work with us deleted!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
        return back();
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Work::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Work with us has been deleted successfully."]);

    }
}
