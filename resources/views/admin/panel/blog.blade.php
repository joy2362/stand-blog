@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary" >
                    <h4 class="card-title ">Blog
                        <a href="{{url('admin/blog/create')}}" class="float-right btn btn-sm btn-rose"  >Add new </a>
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
                                Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Upload By
                            </th>
                            <th>
                                Tags
                            </th>
                            <th>
                                Action
                            </th>
                            </thead>
                            <tbody>
                            @foreach($blog as $row)
                                <tr>
                                    <td>
                                        {{$row->id}}
                                    </td>
                                    <td>
                                        {{$row->title}}
                                    </td>
                                    <td>
                                        {{$row->categoryName->name}}
                                    </td>
                                    <td>
                                        {{$row->user->name}}
                                    </td>
                                    <td>
                                        @foreach($row->tags as $tag)
                                            <span class="badge badge-info">{{$tag->name}}</span>
                                        @endforeach
                                    </td>

                                    <td class="text-primary">
                                        @if($row->is_active)
                                            <a href="{{url('/admin/blog/edit/'.$row->id)}}" class=" btn btn-sm btn-success">Edit </a>
                                            <a href="{{url('/admin/blog/edit/details/'.$row->id)}}" class=" btn btn-sm btn-success">Edit Details</a>
                                        @else
                                            <a href="{{url('/admin/blog/add/details/'.$row->id)}}" class=" btn btn-sm btn-success">Add Description </a>
                                        @endif

                                        <a href="{{url('/admin/blog/delete/'.$row->id)}}" class=" btn btn-sm btn-danger" id="delete">Delete</a>
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
