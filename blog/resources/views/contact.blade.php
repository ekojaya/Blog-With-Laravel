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
            
            <form action="#" method="post">
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
                      <input type="text" id="name" class="form-control " value="{{$user->name}}" disabled>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" class="form-control ">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control " value="{{$user->email}}" disabled>
                    </div>
                  </div>
                  @endguest


                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
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