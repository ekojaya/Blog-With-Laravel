@extends('layouts.head')
@section('title',"$user->name")
@section('content')
<div class="container">
       <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">

            
<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    


  <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('images/'.$user->image)}}"
                       alt="User profile picture"
                       style="border-radius: 120px height :150px; width: 150px "
                       >

                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Where From :</b> <a class="float-right">{{$user->kota_asal}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Favorite Food :</b> <a class="float-right">{{$user->favo_food}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Favorite Place :</b> <a class="float-right">{{$user->favo_place}}</a>
                  </li>
                </ul>

               
              </div>
              <!-- /.card-body -->
            </div>





                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  @include('layouts.info')
			      <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
			        <div class="text-center"><h4>
			          Buat Post
			        </h4></div>
			        {{csrf_field()}}
			        {{method_field('put')}}

                 
                      <div class="form-group">
				      <div class="text-center">
		                  <img class="profile-user-img img-fluid img-circle"
		                       src="{{asset('/images/'.Auth::user()->image)}}"
		                       alt="User profile picture"
		                       style="border-radius: 120px height :150px; width: 150px "
		                       >

                	
				          
				          <input type="file" name="image" class="form-control" >
				          </div>
				        </div>
				      
				        <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-9">
                          <input name="name" class="form-control" id="inputName" value="{{$user->name}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input type="email" name="email"  class="form-control" id="inputEmail" value="{{$user->email}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Where From</label>

                        <div class="col-sm-9">
                          <input name="kota_asal" class="form-control" id="inputName" value="{{$user->kota_asal}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Favorite Food</label>

                        <div class="col-sm-9">
                          <input name="favo_food" class="form-control" id="inputName" value="{{$user->favo_food}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Favorite Place</label>

                        <div class="col-sm-9">
                          <input name="favo_place" class="form-control" id="inputName" value="{{$user->favo_place}}">
                        </div>
                      </div>
                      
                 
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                           
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>






            <!-- Profile Image -->
            








        </div>
            </div></div>

            @endsection

          