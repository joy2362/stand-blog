@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary" >
                    <h4 class="card-title ">Category
                        <a href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-rose"  >Add new </a>
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
                                Slug
                            </th>
                            <th>
                                Last Update
                            </th>
                            <th>
                                Action
                            </th>
                            </thead>
                            <tbody>
                            @foreach($category as $row)
                            <tr>
                                <td>
                                    {{$row->id}}
                                </td>
                                <td>
                                    {{$row->name}}
                                </td>
                                <td>
                                    {{$row->slug}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}
                                </td>
                                <td class="text-primary">
                                    <a href="{{url('/admin/category/edit/'.$row->id)}}" class=" btn btn-sm btn-success">Edit </a>
                                    <a href="{{url('/admin/category/delete/'.$row->id)}}" class=" btn btn-sm btn-danger" id="delete">Delete</a>
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
@endsection
