@extends('layouts.head')
@section('title',"$category2->name Category")
@section('content')

      <div class="container">
       <div class="row blog-entries">
          <div class="col-md-9 col-lg-8 main-content">
            <div class="text-center"><h2>{{$category2->name}} tags<small>( {{$category2->posts()->count()}} )</small></h2></div>
            <hr>
            @foreach($category2->posts as $post)
            <div class="post-item">
              <div class="post-iner">
                <div class="post-head clearfix">
                  <div class="col-md-4">
                  
                    <a href="{{url('posts/'.$post->slug) }}"><img src="{{asset('images/'.$post->image)}}" style="width:100%" height="auto;"></a>
                  </div>
                  <div class="col-md-8">
                    <div class="detail">
                    <h3 class="handle"><a href="{{url('posts/'.$post->slug) }}">{{$post->title}}</a></h3>
                  </div>
                  
                  <div class="post-meta">
                    
                    <span>{{date('j F Y,h:ia',strtotime($post->created_at))}}</span>|
                    <span>by</span>
                    <span><a href="">Admin </a></span>
                    <br>
                   
                  <span class="share">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-youtube"></i>
                  </span>
                  @foreach ($post->tags as $tag)
                  <span class="label label-success">{{$tag->name}}</span>
                  @endforeach
                </div>
             
                  <div class="content">
                    {!!str_limit($post->content,70)!!}
                  </div>
                   
                </div>
              </div>
              </div>
            </div>
           @endforeach
          </div>

      @include('layouts.sidebar')
      </div>
  </div>

  @endsection