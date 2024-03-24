@extends('layout.main')
@section('title')
{{$category->name}}
@endsection
@section('content')
<!-- Main News Start-->
<div class="main-news">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <h2><i class="fas fa-align-justify"></i>{{$category->name}}</h2>
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                @foreach($posts as $post)
                <div class="mn-list">
                  <div class="mn-img">
                    <img src="{{asset('/images/'.$post->image)}}" />
                  </div>
                  <div class="mn-content">
                    <a class="mn-title" href="{{route('posts.show', ['post'=>$post->id])}}">{{$post->title}}</a>
                    <a class="mn-date" href="{{route('posts.show', ['post'=>$post->id])}}"><i class="far fa-clock"></i>{{$post->created_at}}</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
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
        </div>
        <div class="sidebar">
          <div class="sidebar-widget">
            <h2><i class="fas fa-align-justify"></i>Status</h2>
            <div class="category">
              <ul class="fa-ul">
                @foreach($statuss as $status)
                <li>
                  <span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span>
                  <a href="{{route('secondcategories.show', ['secondcategory'=>$status->id])}}">{{$status->name}}</a>
                  <span>{{count($status->posts)}}</span>
                </li>
                @endforeach
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main News End-->
@endsection