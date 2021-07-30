@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Activity') }}  
                    <div class="float-right"><a href="{{route('activity.index')}}">Back</a></div>
                </div>
                <div class="card-body">
                    <form action="{{route('activity.store')}}" method="POST">
                        @csrf
                        <div class="form mb-2">
                            <label class="mb-0">Name</label>
                            <input type="text" class="form-control" value="{{$activities->name}}" disabled readonly>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Day Date *</label>
                            <input type="date" class="form-control" name="day_date" required>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Start</label>
                            <input type="text" class="form-control" name="start" data-inputmask="'mask': '99:99'">
                            <label class="text-danger">Misal {{date('H.i')}}</label>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Finish</label>
                            <input type="text" class="form-control" name="finish">
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Activity</label>
                            <textarea type="text" class="form-control" rows="3" name="activity"></textarea>
                        </div>
                       <div class="form mb-2">
                            <label class="mb-0">Location</label>
                            <input type="text" class="form-control" name="location">
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