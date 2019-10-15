@extends('admin.head')

@section('content')
 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Negara</h1>
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
      <form action="{{route('negara.update',$negara->id)}}" method="post" enctype="multipart/form-data">
        <div class="text-center"><h4>
          Buat Post
        </h4></div>
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-froup">
          <label for="t">Category :</label>
          <input type="text" name="name" value="{{$negara->name}}" class="form-control">
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