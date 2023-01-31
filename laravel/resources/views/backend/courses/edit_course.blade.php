@extends('admin.admin_master')
@section('content')

<div class="content-body" style="min-height: 788px;">
     <div class="container-fluid">
    
        <!-- row -->
        <div class="row">
   
         <div class="col-xl-12 col-lg-12">
             <div class="card">
                  <div class="card-header">
                       <h4 class="card-title">Edit Courses </h4>
                  </div>
   
                  <div class="card-body">
                       <div class="basic-form">
   
                            <form method="post" action="{{ route('update.course',$course->id) }}" enctype="multipart/form-data">
                                 @csrf
                        <input type="hidden" name="old_image" value="{{$course->small_img}}">
                                
                             <div class="form-group">
                                 <label class="info-title">Short Title </label>
                                 <input type="text"  value="{{$course->short_title}}"  name="short_title" class="form-control input-default ">
                                 @error('short_title')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
   
                             <div class="form-group">
                                 <label class="info-title">Short Description </label>
                                 <textarea name="short_description" class="form-control" rows="4"
                                      id="comment"> {{$course->short_description}}</textarea>
                                 @error('short_description')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
   
   
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                      <span class="input-group-text">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                      <input type="file" name="small_img" class="custom-file-input" id="image">
                                      <label class="custom-file-label">Choose file</label>
                                 </div>
                            </div>
   
   
                             <div class="form-group">
                                 <img id="showImage" src="{{asset($course->small_img)}}"
                                      style="width: 100px; height: 100px;">
                             </div>
   
   
                             <div class="form-group">
                                 <label class="info-title">Long Title </label>
                                 <input type="text" value="{{$course->long_title}}"  name="long_title" class="form-control input-default ">
                                 @error('long_title')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
   
                             </div>
   
   
                             <div class="form-group">
                                 <label class="info-title">Skill All</label>
                                 <textarea class="form-control" name="skill_all"
                                      id="summernote2">{{$course->skill_all}}</textarea>
                             </div>
                                
                             <div class="form-group">
                                 <label class="info-title">Total Duration</label>
                                 <input type="text" value="{{$course->total_duration}}" name="total_duration" class="form-control input-default ">
                                 @error('total_duration')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
   
                             </div>
   
                             <div class="form-group">
                                 <label class="info-title">Total Lecture </label>
                                 <input type="text" value="{{$course->total_lecture}}" name="total_lecture" class="form-control input-default ">
                                 @error('total_lecture')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
   
                             </div>
   
                             <div class="form-group">
                                 <label class="info-title">Total Students </label>
                                 <input type="text" value="{{$course->total_student}}" name="total_student" class="form-control input-default ">
                                 @error('total_student')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
   
                             </div>
   
   
                             <div class="form-group">
                                 <label class="info-title">Long Description</label>
                                 <textarea class="form-control" name="long_description" id="summernote1">{{$course->long_description}}</textarea>
                             </div>
   
                             <div class="form-group">
                                      <label class="info-title">Category </label>
                                      <input type="text" value="{{$course->Categories}}" name="Categories" class="form-control input-default ">
                                      @error('Categories')
                                           <span class="text-danger">{{ $message }}</span>
                                      @enderror
        
                             </div>
        
                             <div class="form-group">
                                      <label class="info-title">Tags</label>
                                      <textarea class="form-control" name="Tags" >{{$course->Tags}}</textarea>
                             </div>
        
                             <div class="form-group">
                                           <label class="info-title">Instructor </label>
                                           <input type="text" value="{{$course->Instructor}}" name="Instructor" class="form-control input-default ">
                                           @error('Instructor')
                                                <span class="text-danger">{{ $message }}</span>
                                           @enderror
        
                             </div>
   
   
                             <div class="form-group">
                                      <label class="info-title">Video URL </label>
                                      <input type="text" value="{{$course->video_student}}"name="video_student" class="form-control input-default ">
                                      @error('video_student')
                                           <span class="text-danger">{{ $message }}</span>
                                      @enderror
        
                             </div>
   
                                 <input type="submit" class="btn btn-success" value="Update Course">
   
                            </form>
                       </div>
                  </div>
             </div>
         </div>
   
        </div>
   </div>
   </div>
   



@endsection 