@extends('layout.main')
@section('title')
News - 24
@endsection
@section('content')
<!-- Single News Start-->
<div class="single-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="sn-img">
                    <img src="{{asset('images/'.$post->image)}}" />
                </div>
                <div class="sn-content">
                    <a class="sn-title" href="">{{$post->title}}</a>
                    <a class="sn-date" href=""><i class="far fa-clock"></i>05-Feb-2020/{{$post->created_at}}</a>
                    <p>{{$post->content}}</p>
                </div>
                <div>
                    @auth
                    <a class=" btn btn-outline-success" href="{{route('posts.edit', ['post'=>$post->id])}}">Edit</a>
                    <form action="{{route('posts.destroy', ['post'=>$post->id])}}" method="post" class="d-inline-block">
                        @method('delete')
                        @csrf
                        <button class="btn-danger" type="submit">Delete</button>
                    </form>
                    @endauth
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Category</h2>
                        <div class="category">
                            <ul class="fa-ul">
                                @foreach($categories as $category)
                                <li>
                                    <span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span>
                                    <a href="{{route('categories.show', ['category'=>$category->id])}}">{{$category->name}}</a>
                                    <span>{{count($category->posts)}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Tags</h2>
                        <div class="tags">
                            @foreach($tags as $tag)
                              <a href="">{{$tag->name}}
                              </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single News End-->
@endsection