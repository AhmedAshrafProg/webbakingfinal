@extends('admin.admin_master')
@section('content')
   
<div class="content-body" style="min-height: 788px;">
     <div class="container-fluid">
              <!-- row -->
         <div class="row">
              <div class="col-xl-12 col-lg-12">
              <div class="card">
                   <div class="card-header">
                        <h4 class="card-title">Add Service </h4>
                   </div>
                   <div class="card-body">
                        <div class="basic-form">
                             <form method="post" action="{{ route('service.store') }}" enctype="multipart/form-data">
                                  @csrf

                                  <div class="form-group">
                                  <label class="info-title">Service Name </label>
                                  <input type="text" name="service_name" class="form-control input-default ">
                                  @error('service_name')
                                       <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                  </div>

                                  <div class="form-group">
                                  <label class="info-title">Service Description </label>
                                  <textarea name="service_description" class="form-control" rows="4"
                                       id="comment"></textarea>
                                  @error('service_description')
                                       <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                  </div>
                                  <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                       <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                       <input type="file" name="service_logo" class="custom-file-input" id="image">
                                       <label class="custom-file-label">Choose file</label>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                  <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                       style="width: 100px; height: 100px;">
                                  </div>
                                  <input type="submit" class="btn btn-success" value="Add Service">
                             </form>
                        </div>
                   </div>
              </div>
              </div>
         </div>
         </div>
    </div>

@endsection
