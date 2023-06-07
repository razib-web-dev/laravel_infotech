@extends('layouts.dashboard.masterdashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="profile">Profile</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    @if (auth()->user()->profile_cover_photo)
                    <div class="cover-photo" style="background: url('{{asset('uploads/profile_cover_photos')}}/{{auth()->user()->profile_cover_photo}}') no-repeat; background-position: center;background-size: cover; "></div>
                    @else
                    <div class="cover-photo" style="background: url('{{asset('dashboard_assets/')}}/images/default_cover_photo.jpg')"></div>
                    @endif
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        @if (auth()->user()->profile_photo)
                        <img src="{{asset('uploads/profile_photos')}}/{{auth()->user()->profile_photo}}" class="img-fluid rounded-circle" alt="">
                        @else
                        <img src="{{asset('dashboard_assets')}}/images/defualt_profile_photo.png" class="img-fluid rounded-circle" alt="">
                        @endif

                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0">
                               {{ Str::title(auth()->user()->name);}}
                            </h4>
                            <p>{{auth()->user()->phone_number}}</p>
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                            <p>Email</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" action="{{url('profile/photo/upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Profile Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="profile_photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Profile cover Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="profile_cover_photo">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone_number" placeholder="phone number" value="{{auth()->user()->phone_number}}">
                                @error('phone_number')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Profile Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" action="{{url('password/change')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="current_password" placeholder="Current Password">
                                <strong class="text-danger">{{session('errr')}}</strong>
                                @error('current_password')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" placeholder="New Password">
                                @error('password')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                            </div>
                        </div>
                    </form>
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
