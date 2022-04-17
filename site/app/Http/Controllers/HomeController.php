<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserVisitTable;
use App\ServisModel;
use App\CourseModel;
use App\ProjectModel;
use App\ContactModel;


class HomeController extends Controller
{
    public function homeIndex()
    {
        $userip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Dhaka');
        $timeDate = date("Y-m-d h-i-sa");

        UserVisitTable::insert(['ip_address'=>$userip, 'visit_time'=>$timeDate]);
        $serviceselect = json_decode(ServisModel::all());

        $courseData =json_decode(CourseModel::orderBy('id','desc')->limit(6)->get());

        $projectdataselect = json_decode(ProjectModel::all());

        return view('home', [
            'service'=>$serviceselect,
            'coursedata'=>$courseData,
            'projectSelect'=>$projectdataselect
        ]);
    }

    public function contactSend(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_mobile = $request->input('contact_mobile');
        $contact_emil = $request->input('contact_emil');
        $contact_msg = $request->input('contact_msg');

        $result = ContactModel::insert([
            'contact_name'=>$contact_name,
            'contact_mobile'=>$contact_mobile,
            'contact_emil'=>$contact_emil,
            'contact_msg'=>$contact_msg
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    } 
}
