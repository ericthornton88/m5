@extends('layout')

@section('main_content')
<table border="3">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Total</th>
			<th>Details</th>
		</tr>
		@foreach($invoice as $inv)
			<tr>
				<td>{{$inv -> id}}</td>
				<td>{{$inv -> first_name}} {{$inv -> last_name}}</td>
				<td>{{$inv -> total}}</td>
				<td><a href="edit_customer/{{$inv -> id}}">Details</a></td>
			</tr>
		@endforeach	
	</table>
@endsection
