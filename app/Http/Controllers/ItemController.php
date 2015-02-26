<?php namespace App\Http\Controllers;

use DB;

class ItemController extends Controller {


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

		$results = DB::select('SELECT * FROM item');

		return view('item', ['items' => $results]);
	}

}
