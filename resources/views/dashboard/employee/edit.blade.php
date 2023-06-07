
@extends('layouts.dashboard.masterdashboard')
@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="profile">Employee Edit</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Employee Edit</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" action="{{route('employee.update',$employee->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="{{$employee->firstname}}">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{$employee->lastname}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputEmail1">Companie Name</label>
                            <div class="col-sm-9">
                                <select class="form-control"  name="companie_id">
                                    <option selected value="">=======Choose Companie Name========</option>
                                        @foreach ($companie as $row)
                                        <option value="{{$row->id}}"@if ($row->id==$employee->companie_id) selected="" @endif>{{$row->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{$employee->email}}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$employee->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

