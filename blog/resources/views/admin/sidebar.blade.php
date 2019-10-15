  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admins.index')}}" class="brand-link">
      
      <span class="brand-text font-weight-light">Admin Pages</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/images/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">SETTING</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Posts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('posts.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>create</p>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="{{route('Overall.allpost')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Post</p>
                          </a>
                        </li>

                        


                      </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('category.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                          </a>
                        </li>    
                      </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tags
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('tags.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                          </a>
                        </li>    
                      </ul>
          </li>

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('Overall.alluser') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit</p>
                          </a>
                        </li>    
                      </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Negara
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{ route('negara.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                          </a>
                        </li>    
                      </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Komentar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('Overall.comment1')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Comment</p>
                          </a>
                        </li>  
                      </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pesan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
                       <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="{{route('Overall.allpesan')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Pesan</p>
                          </a>
                        </li>  
                      </ul>
          </li>


          
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>