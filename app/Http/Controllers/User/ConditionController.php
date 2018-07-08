<?php

namespace App\Http\Controllers\User;

use App\Model\user\condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();
        return view('site.page.conditions_terms',compact('conditions'));
    }
}
