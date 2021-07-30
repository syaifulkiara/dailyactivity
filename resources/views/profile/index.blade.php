@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">{{ __('My Profile') }}
        </div>
        <div class="card-body"> 
            <div class="row">
                <div class="col-md-2 mb-2">            
                    <div class="avatar">
                        <img src="{{asset($users->avatar)}}" width="150px" height="150px" class="avatar-img rounded-circle">
                    </div>
                </div>
                <div class="col-md-6 mb-2">            
                   <ul class="list-group">
                      <li class="list-group-item">
                        <strong>{{$users->name}}</strong>
                      </li>
                      <li class="list-group-item">
                        {{$users->email}}
                      </li>
                      <li class="list-group-item">
                        {{$users->nik}}
                      </li>
                       <li class="list-group-item">
                       Bio
                      </li>
                    </ul>
                </div>
                 <div class="col-md-4">            
                    <a href="{{route('profile.edit',$users->id)}}" class="btn btn-warning btn-sm">
                      <strong> Edit Profile Info</strong>
                    </a>
                    <br/><br/>
                    <a href="{{route('changepassword')}}" type="button" class="btn btn-danger btn-sm">
                      Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection