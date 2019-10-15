@extends('admin.head')

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
      <form action="{{route('posts.update',$posts->id)}}" method="post" enctype="multipart/form-data">
        <div class="text-center"><h4>
          Buat Post
        </h4></div>
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-froup">
          <label for="t">Title :</label>
          <input type="text" name="title" value="{{$posts->title}}" class="form-control" placeholder="Input title...">
        </div>

          <div class="form-froup">
          <label for="category_id">Category :</label>
          <select name="category_id" class="form-control">
          <option value="" class="disable selected"> pilih kategory</option>
          @foreach($category as $cate)
          <option value="{{$cate->id}}" <?php if ($posts->category_id == $cate->id){echo"selected";}?>
            >{{ $cate->name }}</option>
          @endforeach
          </select>
          
        </div>


          <div class="form-froup">
          <label for="negara_id">Negara :</label>
          <select name="negara_id" class="form-control">
          <option value="" class="disable selected"> pilih Negara</option>
          @foreach($negara as $neg)
          <option value="{{$neg->id}}" <?php if ($posts->negara_id == $neg->id){echo"selected";}?>
            >{{ $neg->name }}</option>
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
          <label for="image"> Pilih gambar</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <img src="{{asset('images/'.$posts->image)}}" style="width: 500px" "height: 500px">
        </div>

        <div class="form-group">
          <label for="content">Content :</label>
          <textarea type="" name="content" class="form-control" placeholder="Input Content...">{{$posts->content}}</textarea> 
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
<script type="text/javascript">
  
  $(".selectpicker").selectpicker().val({!!json_encode($posts->tags()->allRelatedIds())!!}).trigger('change');

</script>)
@endsection