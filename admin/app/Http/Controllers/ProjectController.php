<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class ProjectController extends Controller
{
    public function projectIndex()
    {
        return view('project');
    }

    public function getProjectData()
    {
       $result=json_encode(ProjectModel::orderBy('id','desc')->get());
       return $result;    
    }
    public function getProjectDetails(Request $req)
    {
        $id = $req->input('id');
       $result=json_encode(ProjectModel::where('id','=',$id)->get());
       return $result;    
    }

    public function projectDelete(Request $req)
    {
        $id = $req->input('id');
        $result = ProjectModel::where('id','=',$id)->delete();
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    public function projectUpdate(Request $req)
    {
        $id = $req->input('id');

        $project_name = $req->input('project_name');
        $project_des = $req->input('project_des');
        $project_link = $req->input('project_link');
        $project_img = $req->input('project_img');

        $result = ProjectModel::where('id','=',$id)->update([
            'project_name'=>$project_name,
            'project_des'=>$project_des,
            'project_link'=>$project_link,
            'project_img'=>$project_img
        ]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    
    public function projectAdd(Request $req)
    {
        $project_name = $req->input('project_name');
        $project_des = $req->input('project_des');
        $project_link = $req->input('project_link');
        $project_img = $req->input('project_img');

        $result = ProjectModel::insert([
            'project_name'=>$project_name,
            'project_des'=>$project_des,
            'project_link'=>$project_link,
            'project_img'=>$project_img,
        ]);
        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
