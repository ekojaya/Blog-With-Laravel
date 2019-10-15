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
              <li class="breadcrumb-item active">Create Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
 
 

  
    <!-- tab pertama 1 -->
    

      <!-- Default box --> 
<div class="well">
   @include('layouts.info')
      
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
       
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Title</label>
                <input type="text" id="inputName" name="title" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="inputStatus">Kategory</label>
                <select class="form-control custom-select" name="category_id">
                  <option selected disabled>Select one</option>
                  
                  @foreach ($category as $cate)
                    <option value="{{$cate->id}}">{{ $cate->name }}</option>
                @endforeach
                  
                </select>
              </div>


                 <div class="form-group">
                <label for="inputStatus">Negara</label>
                <select class="form-control custom-select" name="negara_id">
                  <option selected disabled>Select one</option>
                  
                  @foreach ($negara as $neg)
                    <option value="{{$neg->id}}">{{ $neg->name }}</option>
                @endforeach
                  
                </select>
              </div>


        <div class="form-froup">
          <label for="tags">Tag :</label>
          <select name="tags[]" multiple="multiple" class="form-control selectpicker">
         
          @foreach ($tags as $tag)
          <option value="{{$tag->id}}">{{ $tag->name }}
            
          </option>
          @endforeach
          </select>
          
        </div>


        <div class="form-group">
              <label for="exampleInputFile">Input Gambar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">

                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                
              </div>
            </div>

              <div class="form-group">
                <label for="inputDescription">Content</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="content" placeholder="Input Content..."></textarea>
              </div>

            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
             
          
        
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        
       

        </form>
  
</div>






   
      <div class="card-footer">
          Footer
        </div>
    </div>
     

  





@endsection

