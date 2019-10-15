@extends('admin.head')
@section ('title'," Admin Category")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KATEGORI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Create Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
    <div class="well" >
    
      <form action="{{route('category.store')}}" method="post">
        <div class="text-center"><h4>
          Buat catgory
        </h4></div>
        {{csrf_field()}}
        <div class="form-froup">
          <label for="text">Category:</label>
          <input type="text" name="name" class="form-control" placeholder="Input category...">
        </div>
<br>
        
        <button type="submit" class="btn btn-success btn-block"> simpan</button>

      </form>

    </div>
    <hr>
    <div class="text-center"><h4>Semua kategori</h4><div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th>No.</th>
          <th>nama Kategori</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>tanggal</th>
          </tr>
      </thead>
     <tbody>
              @foreach($category as $showcat)
              <tr>
                <td>{{$showcat->id}}</td>
                <td>{{$showcat->name}}</td>
                <td><a href="{{route('category.edit',$showcat->id)}}" class="btn btn-primary">Edit</a></td>
           <td>
            <form action="{{route('category.destroy',$showcat->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" n class="btn btn-danger"> Hapus</button>
                      
                    </form>
          </td>
                <td>{{date('j F Y',strtotime($showcat->updated_at))}}</td>
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