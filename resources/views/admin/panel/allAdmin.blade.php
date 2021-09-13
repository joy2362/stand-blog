@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary" >
                    <h4 class="card-title ">All Admins
                        @if( Auth::guard('admin')->user()->access->admin)
                        <a href="{{url('admin/access/create')}}" class="float-right btn btn-sm btn-rose"  >Add new </a>
                            @endif
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Added
                            </th>
                            @if( Auth::guard('admin')->user()->access->admin)
                            <th>
                                Action
                            </th>
                            @endif
                            </thead>
                            <tbody>
                            @foreach($admin as $row)
                                <tr>
                                    <td>
                                        {{$row->id}}
                                    </td>
                                    <td>
                                        {{$row->name}}
                                    </td>
                                    <td>
                                        {{$row->email}}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}
                                    </td>
                                    @if( Auth::guard('admin')->user()->access->admin)
                                    <td class="text-primary">
                                        <a href="{{url('/admin/access/delete/'.$row->id)}}" class=" btn btn-sm btn-danger" id="delete">Delete</a>
                                    </td>
                                    @endif
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
