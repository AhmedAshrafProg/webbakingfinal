@extends('admin.admin_master')
@section('content')

 
<div class="content-body" style="min-height: 788px;">
     <div class="container-fluid">
    
        <!-- row -->
        <div class="row">
   
         <div class="col-xl-12 col-lg-12">
             <div class="card">
                  <div class="card-header">
                       <h4 class="card-title">Edit Projects </h4>
                  </div>
   
                  <div class="card-body">
                       <div class="basic-form">
   
                            <form method="post" action="{{ route('update.project',$pro->id) }}" enctype="multipart/form-data">
                                 @csrf
   
      <input type="hidden" name="old_img1" value="{{ $pro->img_one }}">
       <input type="hidden" name="old_img2" value="{{ $pro->img_two }}">



                             <div class="form-group">
                                 <label class="info-title">Project Name </label>
                                 <input value="{{ $pro->project_name }}" type="text" name="project_name" class="form-control input-default ">
                                 @error('project_name')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
   
                             <div class="form-group">
                                 <label class="info-title">Project Description </label>
                                 <textarea name="project_description" class="form-control" rows="4"
                                      id="comment">{{ $pro->project_description }}</textarea>
                                 @error('project_description')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
                             </div>
   

                             <div class="form-group">
                              <label class="info-title">Project Features </label>
                              <textarea name="project_features" class="form-control" rows="4"
                                   id="comment">{{ $pro->project_features }}</textarea>
                              @error('project_features')
                                   <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>


                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                   <input  type="file" name="img_one" class="custom-file-input" id="image">
                                   <label class="custom-file-label">Choose image one file</label>
                              </div>
                         </div>


                          <div class="form-group">
                              <img id="showImage" src="{{ asset($pro->img_one) }}"
                                   style="width: 100px; height: 100px;">
                          </div>


   
                             <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                      <span class="input-group-text">Upload</span>
                                 </div>
                                 <div class="custom-file">
                                      <input  type="file" name="img_two" class="custom-file-input" id="image1">
                                      <label class="custom-file-label">Choose image two file</label>
                                 </div>
                            </div>
   
                    <div class="form-group">
                                 <img id="showImage1" src="{{ asset($pro->img_two) }}"
                                      style="width: 100px; height: 100px;">
                             </div>
   

                           

   
                             <div class="form-group">
                                 <label class="info-title">Live Prview </label>
                                 <input value="{{$pro->live_preview  }}" type="text" name="live_preview" class="form-control input-default ">
                                 @error('live_preview')
                                      <span class="text-danger">{{ $message }}</span>
                                 @enderror
   
                             </div>
   
   
                           
   
                                 <input type="submit" class="btn btn-success" value="update Project">
   
                            </form>
                       </div>
                  </div>
             </div>
         </div>
   
        </div>
   </div>
   </div>
   


@endsection 