@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List Activity') }}
                    <div class="float-right"><a href="{{route('activity.create')}}">Add Data</a></div>
                </div>
                <div class="card-body">
                    <div>
                    Name : <i class="text text-danger">{{Auth::user()->name}}</i><br/>
                    Nik &nbsp; &nbsp; &nbsp;: {{Auth::user()->nik}}
                        <div class="float-right">
                           <a href="{{route('print')}}" target="_blank" class="btn btn-danger">Print</a>   
                      </div>
                    </div><br/>
                    <table class="table responsive table-bordered table-striped table-sm">
                       <thead>
                          <tr>
                            <th>No</th>
                            <th>Day Date</th>
                            <th>Start</th>
                            <th>Finish</th>
                            <th>Project</th>
                            <th>OT</th>
                            <th>Activity</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($activities->overtime as $row)
                            @if(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Saturday')
                            <tr class="bg-info">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{strftime("%A, %d %B %Y",strtotime($row->day_date))}}
                                </td>
                                @elseif(\Carbon\Carbon::parse($row->day_date)->format('l') == 'Sunday')
                                <tr class="bg-success">
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{strftime("%A, %d %B %Y",strtotime($row->day_date))}}
                                    </td>
                                    @else 
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
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
                                        <td style="text-align: center;">
                                            <div class="btn-group">
                                                <a href="{{ route('activity.edit', $row->id)}}" class="btn btn-warning btn-sm">Edit</a>  &nbsp; 
                                                <form action="{{ route('activity.destroy', $row->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')" >Delete</button>
                                                </form>
                                            </div>  
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
@endsection
