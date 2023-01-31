@extends('admin.admin_master')
@section('content')
  

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contact Page </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Name </strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Message</strong></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($contact as $row)
                                            
                                        <tr>
                                            <td>{{$row->name  }} </td>
                                            <td>{{$row->email  }} </td>
                                            <td>{{$row->message  }} </td>
                                            
                                            <td>
                                                <div class="d-flex">

                                                    <a href="{{ route('message.delete', $row->id) }}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                         
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
