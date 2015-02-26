@extends('layout')

@section('main_content')
<a href="/invoice">Back</a>
<table border="3">
		<tr>
			<th>Quantity</th>
			<th>Item</th>
			<th>Cost</th>
			<th>Sub-Total</th>
			<th>Remove</th>
		</tr>
		@foreach($invoice as $inv)
			<tr>
				<td>{{$inv->quantity}}</td>
				<td>{{$inv->name}}</td>
				<td>{{$inv->price}}</td>
				<td>{{$inv->sub_total}}</td>
				<td><a href="">Remove</a></td>
			</tr>
		@endforeach
		<td></td>
		<td></td>
		<td>Total</td>
		<td>{{$total}}</td>
		<td></td>
	</table>
	<form action="/invoice/{{$id}}/addItem" method="POST">
		Quantity
		<input type="number" name="quantity">
		<select name="item">
			@foreach($items as $item)
				<option value="{{$item -> id}}">{{$item -> name}}</option>
			@endforeach
		</select>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<button>Submit</button>
	</form>
@endsection