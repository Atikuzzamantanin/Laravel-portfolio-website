<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CourseController extends Controller
{
    public function corsIndex()
    {
        return view('course');
    }

    public function getCourseData()
    {
       $result=json_encode(CourseModel::orderBy('id','desc')->get());
       return $result;    
    }
    public function getCourseDetails(Request $req)
    {
        $id = $req->input('id');
       $result=json_encode(CourseModel::where('id','=',$id)->get());
       return $result;    
    }

    public function courseDelete(Request $req)
    {
        $id = $req->input('id');
        $result = CourseModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function courseUpdate(Request $req)
    {
        $id = $req->input('id');

        $course_name = $req->input('course_name');
        $course_des = $req->input('course_des');
        $course_fee = $req->input('course_fee');
        $course_totalenroll = $req->input('course_totalenroll');
        $course_totalclass = $req->input('course_totalclass');
        $course_link = $req->input('course_link');
        $course_img = $req->input('course_img');

        $result = CourseModel::where('id','=',$id)->update([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img
        ]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    
    public function courseAdd(Request $req)
    {
        $course_name = $req->input('course_name');
        $course_des = $req->input('course_des');
        $course_fee = $req->input('course_fee');
        $course_totalenroll = $req->input('course_totalenroll');
        $course_totalclass = $req->input('course_totalclass');
        $course_link = $req->input('course_link');
        $course_img = $req->input('course_img');

        $result = CourseModel::insert([
            'course_name'=>$course_name,
            'course_des'=>$course_des,
            'course_fee'=>$course_fee,
            'course_totalenroll'=>$course_totalenroll,
            'course_totalclass'=>$course_totalclass,
            'course_link'=>$course_link,
            'course_img'=>$course_img,
        ]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

}
