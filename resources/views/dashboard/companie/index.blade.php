@extends('layouts.dashboard.masterdashboard')
 @section('content')
 <div class="row">
    <div class="col-lg-9">
        <div class="page-titles d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">companie<span class="badge btn-primary"></span></a></li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('companie.create')}}" class="btn btn-info btn-sm rounded-0">Create New Companie</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th>SL</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Website</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companie as $row)
                            <tr>
                                <td>{{$companie ->firstitem()+$loop->index + 0}}</td>
                                <td>
                                    @if ($row->logo)
                                    <img src="{{asset('storage/logo')}}/{{$row->logo}}" class="img-fluid rounded-circle" alt="" style="width: 70px; height: 70px;">
                                    @else
                                    <img src="{{asset('dashboard_assets')}}/images/defualt_logo.png" class="img-fluid rounded-circle" alt="" style="width: 70px; height: 70px;">
                                    @endif
                                </td>
                                <td >{{$row->name}}</td>
                                <td >{{$row->email}}</td>
                                <td >{{$row->website}}</td>
                                <td >{{$row->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-2"><a href="{{route('companie.edit',$row->id)}}" class="btn btn-primary btn-sm rounded-0">Edit</a></div>
                                        <div>
                                            <form action="{{route('companie.destroy',$row->id)}}" method="POST">
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
                        {{$companie->links()}}
                    </tr>
                 </div>

            </div>
        </div>
    </div>
</div>
 @endsection


