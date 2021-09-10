@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary" >
                    <h4 class="card-title ">Category <a href="#" class="float-right btn btn-sm btn-rose" data-toggle="modal" data-target="#addcategory" >Add new </a></h4>
                </div>
                <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="addcategory" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addcategory">Add Category</h5>
                            </div>
                            <form method="post" action="{{url('/admin/category/add')}}">
                            <div class="modal-body">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="categoryName">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
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
                                Country
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Salary
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Dakota Rice
                                </td>
                                <td>
                                    Niger
                                </td>
                                <td>
                                    Oud-Turnhout
                                </td>
                                <td class="text-primary">
                                    $36,738
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Minerva Hooper
                                </td>
                                <td>
                                    Curaçao
                                </td>
                                <td>
                                    Sinaai-Waas
                                </td>
                                <td class="text-primary">
                                    $23,789
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Sage Rodriguez
                                </td>
                                <td>
                                    Netherlands
                                </td>
                                <td>
                                    Baileux
                                </td>
                                <td class="text-primary">
                                    $56,142
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Philip Chaney
                                </td>
                                <td>
                                    Korea, South
                                </td>
                                <td>
                                    Overland Park
                                </td>
                                <td class="text-primary">
                                    $38,735
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    Doris Greene
                                </td>
                                <td>
                                    Malawi
                                </td>
                                <td>
                                    Feldkirchen in Kärnten
                                </td>
                                <td class="text-primary">
                                    $63,542
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    Mason Porter
                                </td>
                                <td>
                                    Chile
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td class="text-primary">
                                    $78,615
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> Table on Plain Background</h4>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="">
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Country
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Salary
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Dakota Rice
                                </td>
                                <td>
                                    Niger
                                </td>
                                <td>
                                    Oud-Turnhout
                                </td>
                                <td>
                                    $36,738
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Minerva Hooper
                                </td>
                                <td>
                                    Curaçao
                                </td>
                                <td>
                                    Sinaai-Waas
                                </td>
                                <td>
                                    $23,789
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Sage Rodriguez
                                </td>
                                <td>
                                    Netherlands
                                </td>
                                <td>
                                    Baileux
                                </td>
                                <td>
                                    $56,142
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Philip Chaney
                                </td>
                                <td>
                                    Korea, South
                                </td>
                                <td>
                                    Overland Park
                                </td>
                                <td>
                                    $38,735
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    Doris Greene
                                </td>
                                <td>
                                    Malawi
                                </td>
                                <td>
                                    Feldkirchen in Kärnten
                                </td>
                                <td>
                                    $63,542
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    Mason Porter
                                </td>
                                <td>
                                    Chile
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td>
                                    $78,615
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
