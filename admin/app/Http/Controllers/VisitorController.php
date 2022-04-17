<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserVisitTable;

class VisitorController extends Controller
{
    public function visitIndex()
    {
        $visitorData = json_decode(UserVisitTable::orderBy('id','desc')->take(50)->get());
        return view('visitpage', ['visitorData'=>$visitorData]);
    }
}
