@extends('layout')

@section('main_content')
	<table border="3">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>New Invoice</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		@foreach($customer as $cust)
			<tr>
				<td>{{$cust -> first_name}}</td>
				<td>{{$cust -> last_name}}</td>
				<td><a href="customer/{{$cust->id}}/newInvoice">New Invoice</a></td>
				<td><a href="customer/{{$cust -> id}}/edit">Edit</a></td>
				<td><a href="">Remove</a></td>
			</tr>
		@endforeach	
	</table>
@endsection
