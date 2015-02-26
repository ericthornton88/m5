<?php namespace App\Http\Controllers;

use DB;

class CustomerController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	public function all()
	{
		$results = DB::select('select * from customer;');
		// $customer = $results[0];
		return view('customer', ['customer' => $results]);
	}

	public function details($id) {
		
		$sql = 'select * from customer where id = :id';

		$results = DB::select($sql, ['id' => $id]);
		
		return view('customer', ['customer' => $results]);
	}

	public function delete() {

	}

	public function edit($id) {
		$sql = 'select * from customer where id = :id';

		$results = DB::select($sql, ['id' => $id]);
		
		return view('customer_edit', ['customer' => $results]);

		// @if ({{$cust -> gender}} == 'm')
		// 	$gender = 'male';
		// @else
		// 	$gender = 'female';
		// @endif
		
	}

	public function addInvoice($id) {

		$sql = "
			INSERT INTO invoice (customer_id, created_at)
			VALUES (:id, NOW())
			";

		$sql_values = [
			':id' => $id
		];
		
		$results = DB::insert($sql, $sql_values);
		$invoice_id = DB::getPdo()->lastInsertId();


		

		return redirect('/invoice/' . $invoice_id);
	}

}
