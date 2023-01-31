<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    public function CourseView(){
        $resule=Courses::all();
        return $resule;
    }

    public function LastFourCourses(){
        $resule=Courses::limit(4)->get();
        return $resule;
    }

    public function CourseDetails($CID){
        $id=$CID;
        $resule=Courses::where('id', $CID)->get();
        return $resule;
    }


public function showCourses(){


    $courses=Courses::Paginate(3);
    return view('backend.courses.all_courses' ,compact('courses'));

}


public function AddCourse(){
    return view('backend.courses.add_course');

}

public function StoreCourse(Request $request){


    $request->validate([
        'short_title' => 'required',
        'short_description' => 'required',
        'small_img' => 'required',
    ]);

    $file = $request->file('small_img');
    //ctp.png
    $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
    //211230.png
    $file->move('upload/courses', $filename);

    $save_url= 'upload/courses/'.$filename;

    Courses::insert([
        'short_title' => $request->short_title,
        'short_description' => $request->short_description,
        'long_title' => $request->long_title,
        'long_description' => $request->long_description,
        'total_duration' => $request->total_duration,
        'total_lecture' => $request->total_lecture,
        'total_student' => $request->total_student,
        'Categories' => $request->Categories,
        'Tags' => $request->Tags,
        'Instructor' => $request->Instructor,
        'skill_all' => $request->skill_all,
        'video_student' => $request->video_student,
        'small_img' => $filename,
    ]);

    $notification = array(
        'message' => 'Courses Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('allcourses')->with($notification);


}


public function DeleteCourse($id){



    Courses::findOrFail($id)->delete();
    $notification = array(
        'message' => 'course deteted Successfully',
        'alert-type' => 'warning'
     );

    return redirect()->route('allcourses')->with($notification);

}

public function EditCourse($id){

    $course=Courses::findOrFail($id);

    return view('backend.courses.edit_course',compact('course'));



}


public function updateCourse(Request $request , $id){

    $request->validate([
        'short_title' => 'required',
        'short_description' => 'required',
        'small_img' => 'required',
    ]);
   
    
   if($request->file('small_img')){

    $old_image = $request->old_image;
    unlink($old_image);

    $file = $request->file('small_img');
    //ctp.png
    $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
    //211230.png
    $file->move('upload/courses', $filename);

    $save_url= 'upload/courses/'.$filename;

    Courses::findOrFail($id)->update([
        'short_title' => $request->short_title,
        'short_description' => $request->short_description,
        'long_title' => $request->long_title,
        'long_description' => $request->long_description,
        'total_duration' => $request->total_duration,
        'total_lecture' => $request->total_lecture,
        'total_student' => $request->total_student,
        'Categories' => $request->Categories,
        'Tags' => $request->Tags,
        'Instructor' => $request->Instructor,
        'skill_all' => $request->skill_all,
        'video_student' => $request->video_student,
        'small_img' => $save_url,
    ]);

    $notification = array(
        'message' => 'Courses update Successfully with image',
        'alert-type' => 'success'
    );

    return redirect()->route('allcourses')->with($notification);




}else{

    Courses::findOrFail($id)->update([
        'short_title' => $request->short_title,
        'short_description' => $request->short_description,
        'long_title' => $request->long_title,
        'long_description' => $request->long_description,
        'total_duration' => $request->total_duration,
        'total_lecture' => $request->total_lecture,
        'total_student' => $request->total_student,
        'Categories' => $request->Categories,
        'Tags' => $request->Tags,
        'Instructor' => $request->Instructor,
        'skill_all' => $request->skill_all,
        'video_student' => $request->video_student,
      
    ]);

    $notification = array(
        'message' => 'Courses update Successfully without image',
        'alert-type' => 'success'
    );

    return redirect()->route('allcourses')->with($notification);


}



}




}
