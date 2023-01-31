<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function ProjecteView()
    {
        $resule=Projects::all();
        return $resule;
    }


    public function LastThreeProject()
    {
        $resule=Projects::limit(3)->get();
        return $resule;
    }

    public function ProjectDetails($PID)
    {
        $id=$PID;

        $resule=Projects::where('id', $PID)->get();
        return $resule;
    }


    public function showProjects()
    {
        $pro=Projects::Paginate(4);

        return view('backend.projects.all_projects', compact('pro'));
    }



    public function AddProjects()
    {


        return view('backend.projects.add_project');
    }

    

public function StoreProject(Request $request){

    $request->validate([
        'project_name' => 'required',
        'project_description' => 'required',
        'project_features' => 'required',

    ]);



    $file = $request->file('img_one');
    //ctp.png
    $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
    //211230.png
    $file->move('upload/project/img1', $filename);

    $save_url= 'upload/project/img1/'.$filename;


    $file1 = $request->file('img_two');
    //ctp.png
    $filename1 = date('YmdHi').'.'.$file1->getClientOriginalExtension();
    //211230.png
    $file1->move('upload/project/img2', $filename1);

    $save_url1= 'upload/project/img2/'.$filename1;



    Projects::insert([


        'img_one' => $save_url,
        'img_two' =>  $save_url1,
        'project_name' => $request->project_name,
        'project_description' => $request->project_description,
        'project_features' => $request->project_features,
        'live_preview' => $request->live_preview,
        
    ]);

    $notification = array(
        'message' => 'project Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.projects')->with($notification);

}



 public function DeleteProjects($id)
{
    Projects::findOrFail($id)->delete();

    $notification = array(
        'message' => 'project deleted Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('all.projects')->with($notification);



}


public function EditProjects($id){

    $pro= Projects::findOrFail($id);

    return view('backend.projects.Edit_project',compact('pro'));


}



public function UpdateProject(Request $request,$id){

$old_img1=$request->old_img1;

$old_img2=$request->old_img2;

    if($request->file('img_one') ||$request->file('img_two')){

        @unlink($old_img1);
        @unlink($old_img2);

        $file = $request->file('img_one');
        //ctp.png
        $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
        //211230.png
        $file->move('upload/project/img1', $filename);
    
        $save_url= 'upload/project/img1/'.$filename;


        $file1 = $request->file('img_two');
        //ctp.png
        $filename1 = date('YmdHi').'.'.$file1->getClientOriginalExtension();
        //211230.png
        $file1->move('upload/project/img2', $filename1);
    
        $save_url1= 'upload/project/img2/'.$filename1;
    
        Projects::findOrFail($id)->update([


            'img_one' => $save_url,
            'img_two' =>  $save_url1,
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            
        ]);
    
        $notification = array(
            'message' => 'project updated Successfully with images',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.projects')->with($notification);


    }else{

        Projects::findOrFail($id)->update([


           
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            
        ]);
    
        $notification = array(
            'message' => 'project updated Successfully without images',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.projects')->with($notification);



    }



}




}
