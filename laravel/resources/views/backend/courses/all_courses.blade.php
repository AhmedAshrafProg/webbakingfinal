@extends('admin.admin_master')
@section('content')

<div class="content-body" style="min-height: 788px;">
     <div class="container-fluid">
         <!-- row -->
         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">course Page </h4>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-responsive-md">
                                 <thead>
                                     <tr>
                                         <th><strong>course Name </strong></th>
                                         <th><strong>course Description</strong></th>
                                         <th><strong>course image</strong></th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     @foreach ($courses as $row)
                                         
                                     <tr>
                                         <td>{{$row->short_title  }} </td>
                                         <td>{{Str::limit($row->short_description,'60' ,'....')  }} </td>
                                         <td> <img src="{{ asset($row->small_img) }}"  style="width: 70px; height: 40px;"> </td>

                                         <td>
                                             <div class="d-flex">
                                                 <a href="{{ route('course.edit', $row->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                     

                                                 <a href="{{ route('course.delete', $row->id) }}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                       

                                             </div>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
{{$courses->links()  }}
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>



@endsection 