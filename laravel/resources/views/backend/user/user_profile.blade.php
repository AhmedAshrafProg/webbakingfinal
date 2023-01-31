@extends('admin.admin_master')


@section('content')

<div class="content-body" style="min-height: 788px;">
  <div class="container-fluid">
         <!-- row -->
     <div class="row">
        <div class="col-xl-12 col-lg-12">
             <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">User Profile Edit</h4>
                  </div>
                  <div class="card-body"> 
                    <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
                      @csrf  

                      <div class="form-group">
                         <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control input-default "  placeholder="user name">   
                      </div>       
                                
                                 
                     <div class="form-group">
                         <input type="text"  value="{{Auth::user()->email}}" name="email" class="form-control input-default " placeholder="email" >                 
                     </div>
                     
                     <div class="input-group mb-3">
                       <div class="input-group-prepend"> <span class="input-group-text">Upload</span> </div>
                                       
                                   
                    <div class="custom-file">
                         <input id="image" type="file" name="profile_photo_path" class="custom-file-input" >              
                             <label class="custom-file-label">Choose file</label>                 
                                       
                                     </div>
                                 </div>
                      <div class="form-group">
                          <img id="showImage" src="{{ asset(Auth::user()->profile_photo_path) }}" style="width: 100px; height: 100px;">
                                                  
                       </div>
                                 <input type="submit" class="btn btn-success" value="Update Profile">
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
        
     </div>
 </div>


 
@endsection
