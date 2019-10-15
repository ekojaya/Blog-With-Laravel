@extends('admin.head')
@section ('title'," Admin Tags")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TAGS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create tags</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">

    <div class="well" >
    
      <form action="{{route('tags.store')}}" method="post">
        <div class="text-center"><h4>
          Buat Tags
        </h4></div>
        {{csrf_field()}}
        <div class="form-froup">
          <label for="text">Tags:</label>
          <input type="text" name="name" class="form-control" placeholder="Input Tags...">
        </div>

        
        <button type="submit" class="btn btn-success btn-block"> simpan</button>

      </form>

    </div>
    <br>
    <div class="text-center"><h4>Semua Tags</h4><div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th>No.</th>
          <th>nama tags</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>tanggal</th>
          </tr>
      </thead>
     <tbody>
              @foreach($tags as $showtags)
              <tr>
                <td>{{$showtags->id}}</td>
                <td>{{$showtags->name}}</td>
               <td><a href="{{route('tags.edit',$showtags->id)}}" class="btn btn-primary">Edit</a></td>
           <td>
            <form action="{{route('tags.destroy',$showtags->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" n class="btn btn-danger"> Hapus</button>
                      
                    </form>
          </td>
                <td>{{date('j F Y',strtotime($showtags->updated_at))}}</td>
              </tr>
              @endforeach
              </tbody>
            
          </table>
            <!-- MODAL DELETE CATEGORY -->
           

              
          
         </div>
         </div>   
    </div>
  </div>
@endsection