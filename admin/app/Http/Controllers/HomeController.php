<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactModel;
use App\CourseModel;
use App\ProjectModel;
use App\ServisModel;
use App\UserVisitTable;

class HomeController extends Controller
{
    public function homeIndex()
    {
       $totalContact= ContactModel::count();
       $totalCourse= CourseModel::count();
       $totalProject= ProjectModel::count();
       $totalServis= ServisModel::count();
       $totalUserVisit= UserVisitTable::count();

        return view('home', [
           'totalContact'=>$totalContact,
           'totalCourse'=>$totalCourse,
            'totalProject'=>$totalProject,
            'totalServis'=>$totalServis,
            'totalUserVisit'=>$totalUserVisit
        ]);
    }
}
