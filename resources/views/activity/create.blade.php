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
                            <input type="text" id="input_start" class="form-control" name="start" data-inputmask="'mask': '99:99'">
                            <label class="text-danger">Misal {{date('H.i')}}</label>
                        </div>
                        <div class="form mb-2">
                            <label class="mb-0">Finish</label>
                            <input type="text" id="input_finish" class="form-control" name="finish" data-inputmask="'mask': '99:99'">
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
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $('#input_start').inputmask({
        mask: 'SJ-AAA-****-99999',
        definitions: {
            A: {
                validator: "[A-Za-z0-9 ]"
            },
        },            
    });
    $('#input_finish').inputmask({
        mask: 'SJ-AAA-****-99999',
        definitions: {
            A: {
                validator: "[A-Za-z0-9 ]"
            },
        },            
    });
</script>
@endpush
