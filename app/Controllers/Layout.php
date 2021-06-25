<?php

namespace App\Controllers;

class Layout extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Anggiprass - CRUD CI4 With Ajax'
		];

		return view('beranda', $data);
	}
}
