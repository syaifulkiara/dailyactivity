@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">{{ __('Edit Profile') }}
        	<div class="float-right"><a href="{{route('profile')}}">Back</a></div>
        </div>
        <div class="card-body"> 
            <div class="row">
                <div class="col-md-2 mb-2">            
                    <div class="avatar">
                        <img src="{{asset($users->avatar)}}" width="150px" height="150px" class="avatar-img rounded-circle">
                    </div>
                </div>
                <div class="col-md-6 mb-2">  
                <form action="{{route('profile.update', $users->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                       
					<div class="mb-2">
                       <label class="mb-0">Your Email</label>
					  <input type="text" readonly class="form-control" value="{{$users->email}}">
					</div>
                    <div class="mb-2">
                    <label class="mb-0">Your Name</label>
					  <input type="text" class="form-control" name="name" value="{{$users->name}}">
					</div>
					<div class="mb-2">
					  <textarea class="form-control"rows="3" placeholder="Bio"></textarea>
					</div>
                       <div class="mb-2">
                        <label class="mb-0">Change Avatar</label>
                      <input type="file" name="avatar" class="form-control">
                    </div>
					<div class="mb-3">
					 <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <a href="{{route('profile')}}" class="btn btn-warning btn-sm">Cancel</a>
					</div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection