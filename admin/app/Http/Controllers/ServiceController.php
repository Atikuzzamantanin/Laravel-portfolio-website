<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServisModel;

class ServiceController extends Controller
{
    public function serIndex()
    {
        return view('services');
        
    }

    public function getServiceData()
    {
       $result=json_encode(ServisModel::orderBy('id','desc')->get());
       return $result;    
    }

    public function getServiceDetails(Request $req)
    {
        $id = $req->input('id');
       $result=json_encode(ServisModel::where('id','=',$id)->get());
       return $result;    
    }

    public function serviceDelete(Request $req)
    {
        $id = $req->input('id');
        $result = ServisModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function serviceUpdate(Request $req)
    {
        $id = $req->input('id');
        $name = $req->input('name');
        $des = $req->input('des');
        $img = $req->input('img');
        $result = ServisModel::where('id','=',$id)->update(['service_name'=>$name,'service_dec'=>$des,'service_img'=>$img]);
        if($result==true){
            return 1;
        }else{
            return 0; 
        }
    }

    public function serviceAdd(Request $req)
    {
        $name = $req->input('name');
        $des = $req->input('des');
        $img = $req->input('img');
        $result = ServisModel::insert(['service_name'=>$name,'service_dec'=>$des,'service_img'=>$img]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
