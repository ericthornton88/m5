@extends('layout')

@section('main_content')

		@foreach($customer as $cust)
			
				<div>First Name<input value="{{$cust -> first_name}}"></input></div>
				<div>Last Name<input value="{{$cust -> last_name}}"></input></div>
				<div>Email<input value="{{$cust -> email}}"></input></div>
				<div>Gender<input value="{{$cust -> gender}}"></input></div>
			
		@endforeach	
	</table>

@endsection