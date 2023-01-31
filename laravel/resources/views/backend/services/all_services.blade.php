@extends('admin.admin_master')
@section('content')
    <h1>All Services</h1>

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Service Page </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Service Name </strong></th>
                                            <th><strong>Service Description</strong></th>
                                            <th><strong>Service Logo</strong></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($services as $row)
                                            
                                        <tr>
                                            <td>{{$row->service_name  }} </td>
                                            <td>{{Str::limit($row->service_discription,'60' ,'....')  }} </td>
                                            <td> <img src="{{ asset($row->service_logo) }}"  style="width: 70px; height: 40px;"> </td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('service.edit', $row->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        

                                                    <a href="{{ route('service.delete', $row->id) }}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                          

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
