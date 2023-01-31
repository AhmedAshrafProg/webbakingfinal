<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class ServiceController extends Controller
{

public function ServiceView(){
    $resule=Services::all();
        return $resule;



}



public function showServices(){

$services=Services::all();

    return view('backend.services.all_services',compact('services'));

}



public function AddService(){

    return view('backend.services.add_service');

}


public function ServiceStore(Request $request){

	$request->validate([
        'service_name' => 'required|string|min:3|max:40',
        'service_description' => 'required',
        'service_logo' => 'required',
    ]);

    $file = $request->file('service_logo');
    //ctp.png

    $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
    //211230.png
    $file->move('upload/service', $filename);

    $save_url= 'upload/service/'.$filename;


    Services::insert(
        [
        'service_name' => $request->service_name,
        'service_discription' => $request->service_description,
        'service_logo' => $save_url,
     ]);


     $notification = array(
        'message' => 'Service Inserted Successfully',
        'alert-type' => 'success'
     );

    return redirect()->route('allservices')->with($notification);






}



public function deleteService($id){

  $old_img=  Services::findOrFail($id)->delete('small_img');
  unlink( $old_img);
    Services::findOrFail($id)->select();
    $notification = array(
        'message' => 'Service deteted Successfully',
        'alert-type' => 'warning'
     );

    return redirect()->route('allservices')->with($notification);


}


public function EditService($id){

    $service= Services::find($id);

    return view ('backend.services.edit_service',compact('service'));

}



public function ServiceUpdate(Request $request,$id){


    if ($request->file('service_logo')) {

        $old_image=$request->old_img;

        @unlink($old_image);

        $file = $request->file('service_logo');
    //ctp.png

    $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
    //211230.png
    $file->move('upload/service', $filename);

    $save_url= 'upload/service/'.$filename;


    Services::findOrFail($id)->update(
        [
        'service_name' => $request->service_name,
        'service_discription' => $request->service_description,
        'service_logo' => $save_url,
     ]);


     $notification = array(
        'message' => 'Service Updated Successfully',
        'alert-type' => 'success'
     );

    return redirect()->route('allservices')->with($notification);


    }else{
        Services::findOrFail($id)->update(
            [
            'service_name' => $request->service_name,
            'service_discription' => $request->service_description,

         ]);


         $notification = array(
            'message' => 'Service Updated Successfully without image',
            'alert-type' => 'success'
         );

        return redirect()->route('allservices')->with($notification);
    }

}








}
