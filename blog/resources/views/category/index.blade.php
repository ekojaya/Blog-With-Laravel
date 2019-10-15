@extends('layouts.head')
@section('title',"ALL Category")
@section('content')

      <div class="container">
        
       <div class="row blog-entries">
          
          <div class="col-md-9 col-lg-8 main-content">
            <div class="text-center"><h2>All Category <small>( {{$category->count()}} )</small></h2></div>
            @foreach($category as $cate)

            <h4><a href="{{url('category/'.$cate->id)}}">{{$cate->name}}</a></h4>
            <div style="border-bottom: 1px solid #099; margin-bottom: 11px;">
              <p>{{$cate->posts()->count()}}<i class="fa fa-list-alt"></i> Posts</p>
            </div>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$cate->created_at->diffForHumans()}}</small></p>
            @endforeach
          </div>


      @include('layouts.sidebar')
      </div>
  </div>
  

  @endsection