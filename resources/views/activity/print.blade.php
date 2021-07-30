<!doctype html>
	<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style type="text/css">
		hr{
			<span style="white-space: pre;"> </span>margin: 20px 0;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			border:1px solid #fff;
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even){background-color: #f2f2f2}
		.delete{
			background-color:#e74c3c;
			color:#fff;
			text-align: center;
		}
		tr:hover{
			background-color:#34495e;
			color:#fff;
		}
		.edit{
			background-color:#3498db;
			color:#fff;
			text-align: center;
		}
		th {
			background-color:#2c3e50;
			color: white;
		}
	</style>
	<title>Print Data Daily Activity</title>
</head>
<body>
	<div class="form-group">
		<div align="center">
		<p><b>Daily Activity</b></p>
			Name : {{Auth::user()->name}}<br/>
			Nik &nbsp;&nbsp; &nbsp;: {{Auth::user()->nik}}
		</div><br/>
		<table class="table responsive" align="center" rules="all" border="1px" style="width:95%;">
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
						</tr>
						@endforeach
					</tbody>  
				</table>
			</div>
			<script>
			window.print();
			</script>
		</body>
		</html>