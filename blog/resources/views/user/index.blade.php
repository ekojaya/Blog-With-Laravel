@extends('admin.head')
@section ('title'," Admin User")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
    <div class="well" >


    <div class="text-center"><h4>Semua User</h4><div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th>No.</th>
          <th>nama</th>
          <th>Email</th>
          <th>Gambar</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>tanggal</th>
          </tr>
      </thead>
     <tbody>
              @foreach($user as $users)
              <tr>
                <td>{{$users->id}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                  <td>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/'.$users->image)}}" class="img-circle elevation-2" alt="Image">
        </div>
       
      </div>
          </td>
                <td><a href="{{route('users.edit',$users->id)}}" class="btn btn-primary">Edit</a></td>
           <td>
            <form action="{{route('users.destroy',$users->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" n class="btn btn-danger"> Hapus</button>
                      
                    </form>
          </td>
        
               
                
                <td>{{date('j F Y',strtotime($users->updated_at))}}</td>
              </tr>
              @endforeach
              </tbody>
            
          </table>
            <!-- MODAL DELETE CATEGORY -->
          
              <!-- MODAL DELETE CATEGORY -->
          
         </div>
         </div>   
    </div>
  </div>
</div>
@endsection
