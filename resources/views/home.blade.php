@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Access') }}
                </div>
                <div class="card-body text-center">

                <a href="{{ route('activity.index')}}"><img src="{{asset('images/icon3.jpg')}}" width="150px" class="rounded-circle" title="List Activity"></a>      
                <a href="{{ route('activity.create')}}"><img src="{{asset('images/note.jpg')}}" width="150px" class="rounded-circle" title="Create Activity"></a>
                @if(Auth::user()->is_admin === 1)
                <a href="{{ route('monitoring')}}"><img src="{{asset('images/icon2.jpg')}}" width="150px" class="rounded-circle" title="Activity"></a>
                @endif
                </div>
            </div>
            <br />
            <div class="card">
                <div class="card-header">{{ __('Users') }}
                </div>
                <div class="card-body">
                @foreach($users as $user)              
                    <a href=""><img src="{{asset($user->avatar)}}" width="100px" height="100px" class="avatar-img rounded-circle"title="{{$user->name}}"></a>
                @endforeach    
                </div>
            </div>
         </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Recent updates') }}
                    </div>
                    <div class="card-body">
                        @foreach($activity_log as $item)
                        <div>
                            <time class="date" datetime="{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}">
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</time>
                                <div class="avatar">
                                    <img src="{{asset($item->user->avatar)}}" width="30px" height="30px" class="avatar-img rounded-circle">
                                    <span class="text">{{$item->user->name}} <a href="#"><i>{{$item->description}}</i></a></span>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
