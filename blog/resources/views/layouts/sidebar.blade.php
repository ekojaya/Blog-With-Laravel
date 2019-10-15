<div class="col-md-12 col-lg-4 sidebar">
       <br>
       <br>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                @guest
                <img src="images/person_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                  
                  <h2>Login dulu </h2>
                     <p>Silahkan Login Dulu</p>
                  <p>
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                  @else
                  <img src="{{asset('/images/'.Auth::user()->image)}}" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                  <h2>{{ Auth::user()->name }}</h2>
                  
                  <p>selamat datang {{ Auth::user()->name }}</p>
                  <p><a href="{{route('users.index')}}" class="btn btn-primary btn-sm">profil</a></p>
                @endguest
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
     
                  <li>
                    <a href="">
                      <img src="/images/img_1.jpg" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                        <div class="post-meta">
                          <span class="mr-2">March 15, 2018 </span> &bullet;
                          <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories <span><a href="{{route('category.index')}}"> (All)</a></span></h3>
              <ul class="categories">
                @foreach($category as $category) 
                <li><a href="{{ url('category/'.$category->id) }}">{{str_limit($category->name,10)}}<span>{{ $category->posts()->count() }}</span></a></li>
                

                @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags<span><a href="{{route('tags.index')}}"> (All)</a></span></h3>
              <ul class="tags">
                @foreach ($tags as $tag)
                <li><a href="{{ url('tags/'.$tag->id) }}">{{$tag->name}}</a></li>
              @endforeach
              </ul>
            </div>
          </div>