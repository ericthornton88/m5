<?php namespace App\Http\Controllers;

use DB;
use Request;

class InvoiceController extends Controller {


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

	public function all() {

		$sql = 'SELECT first_name, last_name, invoice.id, sum(quantity * price) as total
				FROM invoice
				JOIN customer ON (customer.id = invoice.customer_id)
				LEFT JOIN invoice_item ON (invoice_item.invoice_id = invoice.id)
				LEFT JOIN item ON (item.id = invoice_item.item_id)
				GROUP BY invoice.id';

		$results = DB::select($sql);
		return view('invoice', ['invoice' => $results]);
	}

	public function details($id) {

		$sql = 'SELECT quantity, item.name as name, price, (quantity * price) as sub_total, invoice_id, item_id
				FROM item
				JOIN invoice_item ON (item.id = invoice_item.item_id)
				WHERE invoice_id = :id';

		$sqlItem = 'SELECT * FROM item';

		$total = 0;
		

		$results = DB::select($sql, ['id' => $id]);
		foreach ($results as $s) {
			$total += $s->sub_total;
		}
		$items = DB::select($sqlItem);

		return view('invoice_indy', ['invoice' => $results, 'total' => $total, 'items' => $items, 'id' => $id]);
	}

	public function add($id) {
		//call details
		$quantity = Request::input('quantity');
		$item = Request::input('item');


		$sql = 'DELETE FROM invoice_item
				WHERE invoice_id = :id AND item_id = :item
				';
		$sql_values =[
			'id' => $id,
			'item' => $item
		];
		$results = DB::delete($sql, $sql_values);

		$sql = 'INSERT INTO invoice_item (invoice_id, item_id, quantity)
				VALUES (:id, :item, :quantity)
				';
		$sql_values =[
			'id' => $id,
			'item' => $item,
			'quantity' => $quantity
		];

		$results = DB::insert($sql, $sql_values);


		return redirect()->back()->withInput(['id', $id]);
	}

}
