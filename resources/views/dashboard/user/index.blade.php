@extends('layouts.dashboard.masterdashboard')
 @section('content')
 <div class="row">
    <div class="col-lg-9">
        <div class="page-titles d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="profile">User List <span class="badge btn-primary"></span></a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                User List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th>SL</th>
                                <th>Profile Photo</th>
                                <th>User Name</th>
                                <th>E-mail</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $row)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>
                                    @if (auth()->user()->profile_photo)
                                    <img src="{{asset('uploads/profile_photos')}}/{{auth()->user()->profile_photo}}" class="img-fluid rounded-circle" alt="" style="width: 70px; height: 70px;">
                                    @else
                                    <img src="{{asset('dashboard_assets')}}/images/defualt_profile_photo.png" class="img-fluid rounded-circle" alt="" style="width: 70px; height: 70px;">
                                    @endif
                                </td>
                                <td >{{$row->name}}</td>
                                <td >{{$row->email}}</td>
                                <td >{{$row->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
 @endsection

 @section('footer_script')

    @if (Session::has('success_msg'))
        <script>
            toastr.options={
                "progressBar":true,
                "closeButton":true,
                "timeOut": "2000",
            }
            toastr.success("{{Session::get('success_msg')}},");
        </script>
    @endif

     @if (Session::has('errr_msg'))
        <script>
            toastr.options={
                "progressBar":true,
                "closeButton":true,
                "timeOut": "2000",
            }
            toastr.error("{{Session::get('errr_msg')}},");
        </script>
    @endif

@endsection

