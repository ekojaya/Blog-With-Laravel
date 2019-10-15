@extends('admin.head')

@section('content')
 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">




      <!-- Default box --> 
<div class="well">



    @include('layouts.info')
      <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
        <div class="text-center"><h4>
          Buat Post
        </h4></div>
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-froup">
          <label for="t">Nama :</label>
          <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Input title...">
        </div>


        <div class="form-froup">
          <label for="t">email :</label>
          <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Input title...">
        </div>

        <div class="form-group">
          <label for="image"> Pilih gambar</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <img src="{{asset('images/'.$user->image)}}" style="width: 500px" "height: 500px">
        </div>

        <button type="submit" class="btn btn-success"> simpan</button>

      </form>

    </div>
  </div>
<div class="card-footer">
          Footer
        </div>
</div>

@endsection
@section('js')
<!-- untuk menampilkan tags yang akan di edit -->

@endsection