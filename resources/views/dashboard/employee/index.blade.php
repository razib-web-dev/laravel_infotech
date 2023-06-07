@extends('layouts.dashboard.masterdashboard')
 @section('content')
 <div class="row">
    <div class="col-lg-9">
        <div class="page-titles d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Employee<span class="badge btn-primary"></span></a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('employee.create')}}" class="btn btn-info btn-sm rounded-0">Create New Employee</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>E-mail</th>
                                <th>Companie Name</th>
                                <th>Companie Logo</th>
                                <th>Phone</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employee as $row)
                            <tr>
                                <td>{{$employee ->firstitem()+$loop->index + 0}}</td>
                                <td >{{$row->firstname}}</td>
                                <td >{{$row->lastname}}</td>
                                <td >{{$row->email}}</td>
                                <td >{{$row->companie->name}}</td>
                                <td >
                                    @if ($row->companie->logo)
                                    <img src="{{asset('storage/logo')}}/{{$row->companie->logo}}" class="img-fluid " alt="" style="width: 50px; height: 50px;">
                                    @else
                                    <img src="{{asset('dashboard_assets')}}/images/defualt_logo.png" class="img-fluid " alt="" style="width: 50px; height: 50px;">
                                    @endif
                                </td>
                                <td >{{$row->phone}}</td>
                                <td >{{$row->created_at->format('d-m-Y')}}</td>
                                <td >
                                    <div class="d-flex">
                                        <div class="mr-2"><a href="{{route('employee.edit',$row->id)}}" class="btn btn-primary btn-sm rounded-0">Edit</a></div>
                                        <div>
                                            <form action="{{route('employee.destroy',$row->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm rounded-0">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-danger text-center">
                                <td colspan="50">No Data Show</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <tr>
                        {{$employee->links()}}
                    </tr>
                 </div>

            </div>
        </div>
    </div>
</div>
 @endsection



