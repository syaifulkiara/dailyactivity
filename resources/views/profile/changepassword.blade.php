@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">{{ __('Change Password') }}
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
                <form action="{{route('updatepassword')}}" method="POST">
                 @csrf
                 @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <div class="mb-3">
                      <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" placeholder="Old Password" required>
                      @error('oldpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  <div class="mb-3">
                      <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" placeholder="New Password">
                      @error('newpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" placeholder="Confirm New Password">
                      @error('confirmpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                     <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <a href="{{route('profile')}}" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection