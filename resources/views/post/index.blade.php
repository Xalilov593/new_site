@extends('layout.main')
@section('title')
News - 24
@endsection
@section('content')
<!-- Top News Start-->
<div class="top-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="tn-img">
                    <img src="{{asset('images/'.$post->image)}}" />
                    <div class="tn-content">
                        <div class="tn-content-inner">
                            <a class="tn-date" href="{{route('posts.show', ['post'=>$post->id])}}"><i class="far fa-calendar-alt"></i>
                            {{ date('d-F, Y', strtotime($post->created_at)) }}</a>
                            <a class="tn-title" href="{{route('posts.show', ['post'=>$post->id])}}">{{$post->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 tn-right">
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="tn-img">
                            <img src="{{asset('images/'.$post->image)}}" />
                            <div class="tn-content">
                                <div class="tn-content-inner">
                                    <a class="tn-date" href="{{route('posts.show', ['post'=>$post->id])}}"><i class="far fa-calendar-alt"></i>
                                    {{ date('d-F, Y', strtotime($post->created_at)) }}</a>
                                    <a class="tn-title" href="{{route('posts.show', ['post'=>$post->id])}}">{{$post->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top News End-->


<!-- Category News Start-->
<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($categories2 as $category)
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i>{{$category->name}}</h2>
                <div class="row cn-slider">
                    @php
                    $revsedPosts=$category->posts->reverse();
                    @endphp
                    @foreach($revsedPosts as $post)
                    <div class="col-md-6">
                        <div class="cn-img">
                            <img src="{{asset('/images/'.$post->image)}}" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href="{{route('posts.show', ['post'=>$post->id])}}"><i class="far fa-calendar-alt"></i>
                                    {{ date('d-F, Y', strtotime($post->created_at)) }}</a>
                                    <a class="cn-title" href="{{route('posts.show', ['post'=>$post->id])}}">{{$post->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Category News End-->


<!-- Main News Start-->
<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach($categories1 as $category)
                    <div class="col-md-12">
                        <h2><i class="fas fa-align-justify"></i>{{ $category->name }}</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mn-img">
                                    @if($latestPost = $category->posts->sortByDesc('created_at')->first())
                                    <img src="{{ asset('/images/' . $latestPost->image) }}" />
                                    @endif
                                </div>
                                <div class="mn-content">
                                    @if($latestPost)
                                    <a class="mn-title" href="{{ route('posts.show', ['post' => $latestPost->id]) }}">
                                        {{ $latestPost->title }}
                                    </a>
                                    <a class="mn-date" href="{{ route('posts.show', ['post' => $latestPost->id]) }}">
                                        <i class="far fa-calendar-alt"></i>{{ date('d-F, Y', strtotime($latestPost->created_at)) }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @php
                                $postsExceptLatest = $category->posts->sortByDesc('created_at')->slice(1, 5);
                                @endphp
                                @foreach($postsExceptLatest as $post)
                                <div class="mn-list">
                                    <div class="mn-img">
                                        <img src="{{ asset('/images/' . $post->image) }}" />
                                    </div>
                                    <div class="mn-content">
                                        <a class="mn-title" href="{{ route('posts.show', ['post' => $post->id]) }}">
                                            {{ $post->title }}
                                        </a>
                                        <a class="mn-date" href="{{ route('posts.show', ['post' => $post->id]) }}">
                                            <i class="far fa-calendar-alt"></i>{{ date('d-F, Y', strtotime($post->created_at)) }}
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                        <h2><i class="fas fa-align-justify"></i>Status</h2>
                        <div class="status">
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

                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i>Tags</h2>
                        <div class="tags">
                            @foreach($tags as $tag)
                            <a href="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End-->
@endsection