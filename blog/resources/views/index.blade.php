@extends('layouts.head')
@section('title', 'index')

@section('content')

    <!-- END header -->

   <section class="site-section pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="owl-carousel owl-theme home-slider">
              @foreach ($posts as $post)
              <div>
                <a href="{{ url('posts/'.$post->slug) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{asset('images/'.$post->image)}}'); ">
                  <div class="text half-to-full">
                    <div class="post-meta">
                      <span class="category">{{str_limit($post->category->name,5)}}</span>
                      <span class="mr-2">{{date('j F Y,h:ia',strtotime($post->created_at))}}</span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                    </div>
                    <h3>{{str_limit($post->title,10)}}</h3>
                    <p>{{str_limit($post->content,20)}}</p>
                  </div>
                </a>
              </div>
           @endforeach
            </div>
            
          </div>
        


    </section>
    <!-- END section -->

    <section class="site-section py-sm">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="mb-4">Lifestyle Category</h2>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row">

@foreach($posts as $post) 
              <div class="col-md-6">

                <a href="{{ url('posts/'.$post->slug) }}" class="blog-entry">

                  <img src="{{asset('images/'.$post->image)}}" alt="Image placeholder">
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="category">{{str_limit($post->category->name,5)}}</span>
                      <span class="mr-2">{{date('j F Y,h:ia',strtotime($post->created_at))}}</span> &bullet;
                      <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                    </div>
                    <h1>{{str_limit($post->title,10)}}</h1>
                    <h2>
                      {{str_limit($post->content,20)}}
                    </h2>
                  </div>
                </a>
              </div>
              
@endforeach
              </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <li>{{$posts->links()}}</li>

                    </ul>
                </nav>
              </div>
            </div>


           

            

          </div>

          <!-- END main-content -->

          @include('layouts.sidebar')
          <!-- END sidebar -->

        </div>
      </div>
    </section>

  @endsection
 
    <!-- END footer -->
    
    <!-- loader -->
    

