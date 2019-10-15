@extends('layouts.head')
@section('title',"ALL Negara")
@section('content')

      <div class="container">
        
       <div class="row blog-entries">
          
          <div class="col-md-9 col-lg-8 main-content">
            <div class="text-center"><h2>All Negara <small>( {{$negara->count()}} )</small></h2></div>
            @foreach($negara as $neg)

            <h4><a href="{{url('negara/'.$neg->id)}}">{{$neg->name}}</a></h4>
            <div style="border-bottom: 1px solid #099; margin-bottom: 11px;">
              <p>{{$neg->posts()->count()}}<i class="fa fa-list-alt"></i> Posts</p>
            </div>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$neg->created_at->diffForHumans()}}</small></p>
            @endforeach
          </div>


      @include('layouts.sidebar')
      </div>
  </div>
  

  @endsection