@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Activity') }}
                    <div class="float-right"><a href="{{route('activity.index')}}">Back</a></div>
                </div>
                <div class="card-body">
                   <form action="{{route('activity.update', $activities->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form mb-2">
                            <label class="mb-0">Name</label>
                            <input type="text" class="form-control-plaintext" value="{{$users->name}}" readonly>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Day Date *</label>
                            <input type="date" class="form-control" value="{{$activities->day_date}}" name="day_date" required>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Start</label>
                            <input type="text" class="form-control" value="{{$activities->start}}" name="start">
                            <label class="text-danger">Misal {{date('H.i')}}</label>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Finish</label>
                            <input type="text" class="form-control" value="{{$activities->finish}}" name="finish">
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Activity</label>
                            <textarea type="text" class="form-control" rows="3" name="activity">{{$activities->activity}}</textarea>
                        </div>
                       <div class="form mb-2">
                            <label class="mb-0">Location</label>
                            <input type="text" class="form-control" value="{{$activities->location}}" name="location">
                        </div>
                        <div class="mt-2">
                           <div>   
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('activity.index')}}" class="btn btn-danger">Back</a>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection