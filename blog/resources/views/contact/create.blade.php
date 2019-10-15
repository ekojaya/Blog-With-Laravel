@extends('layouts.head')
@section('title',"Contact")
@section('content')

  <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1>Contact</h1>
          </div>
        </div>
        <div class="row blog-entries">
      
          <div class="col-md-10 col-lg-6 main-content">
            
            <form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
            	@guest
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" class="form-control " placeholder="Login..." disabled>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" class="form-control ">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control " placeholder="Login..." disabled>
                    </div>
                  </div>
                  @else
					<div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control " value="{{$user->name}}" >
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="nohp" class="form-control ">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control " value="{{$user->email}}" >
                    </div>
                  </div>
                  @endguest


                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea  type="text"  name="pesan" class="form-control " cols="30" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>
                  </div>
                </form>
              </div>
            

          </div>
      </div>



@endsection