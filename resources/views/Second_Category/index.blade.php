@extends('layout.base')
@section('title')
Admin Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            Id
                                        </th>
                                        <th>Category Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                        <th><a  class="btn btn-success" href="{{route('secondcategories.create')}}">Add Category</a></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{date('d-F, Y', strtotime($category->created_at))}}</td>
                                            <td>
                                                <a href="{{route('secondcategories.edit',['secondcategory'=>$category->id])}}" class="btn btn-primary d-inline-block">Edit</a>
                                                <form action="{{route('secondcategories.destroy', ['secondcategory'=>$category->id])}}" method="post" class="d-inline-block" >
                                                    @method("delete")
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit" >Delete</button>
                                                </form>
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
    </section>
@endsection
