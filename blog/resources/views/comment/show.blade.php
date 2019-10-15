@extends('admin.head')
@section ('title'," Admin Comment")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Komentar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Home</a></li>
              <li class="breadcrumb-item active">liat Koment</li>
            </ol>
          </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>



<div class="text-center"><h4>Semua Komentar</h4><div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th class="text-center">No.</th>
          <th class="text-center">Title </th>
          <th class="text-center">Nama </th>
          <th class="text-center">Koment</th>
          
          <th class="text-center">Delete</th>
          <th class="text-center">tanggal</th>
          </tr>
      </thead>
     <tbody>
        
        @foreach($comments as $comment)
        <tr>
          <td>{{$comment->id}}</td>
          <td>{{$comment->post_id}}</td>
          <td>{{$comment->user->name}}</td>
          <td>{{$comment->comment }}</td>
          
         

          <td>
          	<form action="/comment/{{$comment->id}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" name="" value="hapus" class="btn btn-danger">
                    </form>
          </td>
          <td>{{date('j F Y',strtotime($comment->updated_at))}}</td>
          
        </tr>
        @endforeach
        </tbody>
            
          </table>
            <!-- MODAL DELETE CATEGORY -->
            @foreach($comments as $comment)
              <div class="modal fade" id="{{$comment->id}}-delete">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi hapus comment "<b>{{$comment->id}}</b>"?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden='true'>&times;
                      
                    </button>
                    
                  </div>

                  <div class="modal-body">
                    <form action="/comment/{{$comment->id}}" method="post">
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


         </div>
         </div>  
 <div class="card-footer">
          Footer
        </div>
    </div>

@endsection