@extends('layouts.head')
@section('title',"ALL Tags")
@section('content')

      <div class="container">
        
       <div class="row blog-entries">
          
          <div class="col-md-9 col-lg-8 main-content">
            <div class="text-center"><h2>All tags<small>( {{$tags->count()}} )</small></h2></div>
            @foreach($tags as $tag)

            <h4><a href="{{ url('tags/'.$tag->id) }}">{{$tag->name}}</a></h4>
            <div style="border-bottom: 1px solid #099; margin-bottom: 11px;">
              <p>{{$tag->posts()->count()}}<i class="fa fa-list-alt"></i> Posts</p>
            </div>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$tag->created_at->diffForHumans()}}</small></p>
            @endforeach
          </div>


      @include('layouts.sidebar')
      </div>
  </div>
  

  @endsection