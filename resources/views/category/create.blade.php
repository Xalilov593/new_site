@extends('layout.base')
@section('title')
Admin Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('categories.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1">
                                   @error('name')
                                       <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Add Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection