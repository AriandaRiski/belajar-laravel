<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\galerymodel;

class galerycontroller extends Controller
{
	
   
	public function __construct()
	{
		$this->galerymodel = new galerymodel();
	}

	public function index(){
		
		$data = [

			'galeri' => $this->galerymodel->AllData(),
		];

		return view('v_galery',$data);
	}

	public function detail($id_galeri)
	{
		$data = [

			'galeri' => $this->galerymodel->DetailData($id_galeri),
		];

		return view('v_ketgalery',$data);
	}

}
