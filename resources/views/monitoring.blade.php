@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <table class="table responsive table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Day Date</th>
                <th>Start</th>
                <th>Finish</th>
                <th>Project</th>
                <th>OT</th>
                <th>Activity</th>
                <th>Location</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activity as $row)
            @if(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Saturday')
            <tr class="bg-warning">
                <td>{{$loop->iteration}}</td>
                <td>{{$row->user->name}}</td>
                <td>
                    {{strftime("%A, %d %B %Y",strtotime($row->day_date))}}
                </td>
                @elseif(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Sunday')
                <tr class="bg-danger">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->user->name}}</td>
                    <td>
                        {{strftime("%A, %d %B %Y",strtotime($row->day_date))}}
                    </td>
                    @else 
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->user->name}}</td>
                        <td>
                            {{strftime("%A, %d %B %Y",strtotime($row->day_date))}}
                        </td>
                        @endif
                        <td>{{$row->start}}</td>
                        <td>{{$row->finish}}</td>
                        <td>{{$row->project_no}}</td>
                        <td>{{$row->ot}}</td>
                        <td>{{$row->activity}}</td>
                        <td>{{$row->location}}</td>
                        <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>  
            </table>
        </div>
@endsection
