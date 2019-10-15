@extends('layouts.head')
@section('title',"$post->title")
@section('content')
    <!-- END header -->

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="post-meta">
                        <span class="category">{{$post->category->name}}</span>
                        <span class="mr-2">{{date('j F Y,h:ia',strtotime($post->created_at))}}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
            <div class="post-content-body">
             
            <div class="row mb-5">
              <div class="col-md-12 mb-4 element-animate">
                <img src="{{asset('images/'.$post->image)}}" alt="Image placeholder" class="img-fluid">
              </div>
              
            </div>
            {{$post->content}}

            <div class="pt-5">
              <div class="kategori" >
                <p>Tags :</p>
                @foreach ($post->tags as $tag)
                  <span class="label label-default right">#{{$tag->name}}</span>
                  @endforeach
                  </div>
                   
                </div>

               
            </div>
          </div>

          @include('layouts.sidebar')
        </div>
          <hr>
          <h3>Comment :</h3>
          <div class="panle with-nav-tabs panel-default">
            <div class="panel-heading">
            <ul class="nav nav-tabs">
              <li class="activate"><a href="#tab1" data-toggle="tab" > All Comment </a>
              </li>
              <li><a href="#tab2" data-toggle="tab" >Ad Comment:</a></li>
              <li><a href="#" data-toggle="tab" >Disqus</a></li>
            </ul>              
            </div>
            <div class="panel-body">
              <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1" >
                  @foreach($post->comments as $comment)
                  <div class="post-item">
                    <div class="post-inner">
                      <div class="post-head clearfix">
                        <div class="col-md-2">
                      
                          <img src="{{asset('images/'.$comment->user->image)}}"alt="Image placeholder" style="border-radius: 120px height :100px; width: 100px ">
                        </div>
                        <div class="colmd-10">
                          <h4>{{ $comment->comment }}</h4>
                          <hr>
                          <p>by <a href="">{{$comment->user->name}}</a></p>
                          <div class="pull-right">
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
           @endforeach
                </div>
                <div class="tab-pane fade" id="tab2">
                  <form action="{{route('buatkomentar.store',$post->id)}}" method="post">
                    {{csrf_field()}}
                    <label>Tulis Komentar :</label>
                    <div class="form-group">
                      <textarea type="text" name="comment" class="form-control" placeholder="Tulis Komentar...">
                        
                      </textarea>
                      
                    </div>
                    <button class="btn btn-success" type="submit">
                      Comment
                    </button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
        </section>


@endsection