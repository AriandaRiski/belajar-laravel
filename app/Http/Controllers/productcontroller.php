<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productmodel;

class productcontroller extends Controller
{
	
   
	public function __construct()
	{
		$this->productmodel = new productmodel();
	}

	public function index(){
		
		$data = [

			'produk' => $this->productmodel->AllData(),
		];

		return view('v_product',$data);
	}

public function index_artikel(){
		
		$data = [

			'artikel1' => $this->productmodel->AllData_artikel(),
		];

		return view('v_artikel',$data);
	}

	
}
