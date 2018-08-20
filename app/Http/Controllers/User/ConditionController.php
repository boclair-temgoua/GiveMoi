<?php

namespace App\Http\Controllers\User;

use App\Model\user\condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::where('status',1)->orderBy('created_at','DESC')->get();
        return view('site.page.conditions_terms',compact('conditions'));
    }
}
