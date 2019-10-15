@extends('admin.head')
@section ('title'," Admin Pesan")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pesan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admins.index')}}">Home</a></li>
              <li class="breadcrumb-item active">liat Pesan</li>
            </ol>
          </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>



<div class="text-center"><h4>Semua pesan</h4><div>
    <table class="table table-striped table-hover" >
      <thead>
        <tr class="info">
          <th class="text-center">No.</th>
          <th class="text-center">nama </th>
          <th class="text-center">email </th>
          <th class="text-center">No Hp</th>
          <th class="text-center">Pesan</th>
          
          <th class="text-center">Delete</th>
          <th class="text-center">tanggal</th>
          </tr>
      </thead>
     <tbody>
        
        @foreach($pesan1 as $pesan)
        <tr>
          <td>{{$pesan->id}}</td>
          <td>{{$pesan->name}}</td>
          <td>{{$pesan->email}}</td>
          <td>{{$pesan->nohp }}</td>
            <td>{{str_limit($pesan->pesan,20) }}</td>
     

          <td>
          	<form action="{{route('contact.destroy',$pesan->id)}}"method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" name="" value="hapus" class="btn btn-danger">
                    </form>
          </td>
          <td>{{date('j F Y',strtotime($pesan->updated_at))}}</td>
          
        </tr>
        @endforeach
        </tbody>
            
          </table>
            <!-- MODAL DELETE CATEGORY -->
            
              <!-- MODAL EDIT CATEGORY -->


         </div>
         </div>  
 <div class="card-footer">
          Footer
        </div>
    </div>

@endsection