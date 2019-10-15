@extends('admin.head')

@section ('title'," Admin Post")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>POST</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Home</a></li>
              <li class="breadcrumb-item active">All Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">

      <div class="well">
   @include('layouts.info')



   <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Semua POSTS</h3>
            </div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th >No.</th>
          <th >Title </th>
          <th >Edit</th>
          <th >Delete</th>
          <th >tanggal</th>
          </tr>
      </thead>
     <tbody>
        @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i></a></td>
          <td><a href="#{{$post->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
          <td>{{date('j F Y',strtotime($post->updated_at))}}</td>
        </tr>
        @endforeach
        </tbody>
            
          </table>
            <!-- MODAL DELETE CATEGORY -->
            @foreach($posts as $post)
              <div class="modal fade" id="{{$post->id}}-delete">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi hapus Posts "<b>{{$post->title}}</b>"?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden='true'>&times;
                      
                    </button>
                    
                  </div>

                  <div class="modal-body">
                    <form action="{{route('posts.destroy',$post->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" name="" value="hapus" class="btn btn-danger btn-block">
                    </form>
                  </div>
                </div>
                  
                </div>
              </div>
              @endforeach
              <!-- MODAL EDIT CATEGORY -->

        {{$posts->links()}}
         </div>

         </div>

    </div>
    

    </div>
      <div class="card-footer">
          Footer
        </div>
    </div>
    
     

  





@endsection