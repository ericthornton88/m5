@extends('layout')

@section('main_content')
<table border="3">
		<tr>
			<th>Product</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Remove</th>
		</tr>
		@foreach($items as $item)
			<tr>
				<td>{{$item -> name}}</td>
				<td>{{$item -> price}}</td>
				<td><a href="">Edit</a></td>
				<td><a href="">Remove</a></td>
			</tr>
		@endforeach	
	</table>
@endsection
