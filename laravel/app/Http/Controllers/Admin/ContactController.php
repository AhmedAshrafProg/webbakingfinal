<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request){

      $ContactArray= json_decode($request->getContent(),true); 

     $result= Contact::insert([
        'name' => $ContactArray['name'], 
        'email' => $ContactArray['email'], 
        'message' => $ContactArray['message'], 

      ]);

   if($result){
return'data inserted sucessfully';

      }else{
        return'error';

      }


    }






public function ViewMessages(){
  $contact=Contact::All();
  return view ('backend.contact.view_messages',compact('contact'));
}


public function DeleteMessages($id){

  Contact::findOrFail($id)->delete();

  $notification = array(
    'message' => 'Meassage Deleted Successfully',
    'alert-type' => 'warning'
 );

return redirect()->route('view.Messages')->with($notification);

}



}
