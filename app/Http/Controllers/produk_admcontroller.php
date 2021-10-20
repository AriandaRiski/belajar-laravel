<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk_admmodel;

class produk_admcontroller extends Controller
{

	public function __construct()
	{
		$this->produk_admmodel = new produk_admmodel();
		$this->middleware('auth');
	}

    public function index()
    {
    	$data = ['produkk'=>$this->produk_admmodel->alldata(),];

    	return view('/admin.v_produkadmin',$data);
    }


public function detail($id_produk)
	{
		if (!$this->produk_admmodel->DetailData($id_produk)) {
			abort(404);
		}
		$data = [

			'pro' => $this->produk_admmodel->DetailData($id_produk),
		];

		
	}


    public function index2()
    {
    	$data = ['galeri2'=>$this->produk_admmodel->alldata2(),];

    	return view('/admin.v_galeryadmin',$data);
    }

    public function add()
	{
		return view('/admin.v_add');
	}

	public function insert()
	{
		Request()->validate
		([
			'judul' => 'required',
			'deskripsi' => 'required',
			'gambar_produk' => 'required|mimes:jpg,jpeg,png,svg',
		]);

		//upload gambar
		$file = Request()->gambar_produk;
		$fileName = Request()->judul.'.'. $file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[

			'judul' => Request()->judul,
			'deskripsi' => Request()->deskripsi,
			'gambar_produk'=>$fileName  
		];
			$this->produk_admmodel->addData($data);
			return redirect()->route('produk')->with('pesan','PRODUK BERHASIL DI TAMBAHKAN');
	}

public function edit($id_produk)
	{ 
		if (!$this->produk_admmodel->DetailData($id_produk)) {
			abort(404);
		}
		$data = [
			'data_produk' => $this->produk_admmodel->DetailData($id_produk),
		];

		return view('admin/v_editproduk',$data);
	}

	public function update($id_produk)
	{
		if (Request()->gambar_produk) {
		Request()->validate
		([
			'judul' => 'required',
			'deskripsi' => 'required',
			'gambar_produk' => 'mimes:jpg,jpeg,png,svg',
		]);

		//upload gambar
		$file = Request()->gambar_produk;
		$fileName = Request()->judul.'.'. $file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[

			'judul' => Request()->judul,
			'deskripsi' => Request()->deskripsi,
			'gambar_produk'=>$fileName  
		];
			$this->produk_admmodel->editData($id_produk,$data);
		}else {
			$data = 
		[

			'judul' => Request()->judul,
			'deskripsi' => Request()->deskripsi,
		];
			$this->produk_admmodel->editData($id_produk,$data);
		}
		
			return redirect()->route('produk')->with('pesan','PRODUK BERHASIL DI UPDATE');
	}


	public function delete($id_produk)
	{

		//delete foto dalam folder

			$gambarproduk = $this->produk_admmodel->DetailData($id_produk);
			if ($gambarproduk->gambar_produk <> " ") {
				unlink(public_path('/img').'/'.$gambarproduk->gambar_produk);
			}

			$this->produk_admmodel->deleteData($id_produk);
			return redirect()->route('produk')->with('pesan','PRODUK BERHASIL DI HAPUS');

	}

//galeri
 	public function add2()
	{
		return view('/admin.v_add2');
	}

	public function insert2()
	{
		Request()->validate
		([
			'deskripsi' => 'required',
			'gambar'	=> 'required|mimes:jpg,jpeg,png,svg',
		]);

		$file = Request()->gambar;
		$fileName = Request()->id_galeri.'.'.$file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[
			'deskripsi' => Request()->deskripsi,
			'gambar'	=> $fileName
		];
			$this->produk_admmodel->addData2($data);
			return redirect()->route('galeri')->with('pesan','GAMBAR BERHASIL DI TAMBAHKAN');

	}

	
//edit data galeri
	public function edit2($id_galeri)
	{
		if (!$this->produk_admmodel->DetailData2($id_galeri)) {
			abort(404);
		}
		$data = [
			'data_galeri' => $this->produk_admmodel->DetailData2($id_galeri),
		];

		return view('admin/v_editgaleri',$data);
	}

	public function update2($id_galeri)
	{
		if (Request()->gambar) {
		Request()->validate
		([
			'deskripsi' => 'required',
			'gambar' => 'mimes:jpg,jpeg,png,svg',
		]);

		//upload gambar
		$file = Request()->gambar;
		$fileName = Request()->judul.'.'. $file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[			
			'deskripsi' => Request()->deskripsi,	
			'gambar'	=> $fileName

		];
			$this->produk_admmodel->editData2($id_galeri,$data);
		}else {
			$data = 
		[
			'deskripsi' => Request()->deskripsi,
		];
			$this->produk_admmodel->editData2($id_galeri,$data);
		}
		
			return redirect()->route('galeri')->with('pesan','FOTO BERHASIL DI UPDATE');
	}

	public function delete2($id_galeri)
	{

		//delete foto dalam folder

			$gambar = $this->produk_admmodel->DetailData2($id_galeri);
			if ($gambar->gambar <> " ") {
				unlink(public_path('/img').'/'.$gambar->gambar);
			}

			$this->produk_admmodel->deleteData2($id_galeri);
			return redirect()->route('galeri')->with('pesan','FOTO BERHASIL DI HAPUS');

	}

	//ARTIKEL
	   public function index3()
    {
    	$data = ['artikel1'=>$this->produk_admmodel->alldata3(),];

    	return view('/admin.v_artikeladmin',$data);
		return view('v_artikel',$data);

    }

	

    public function detail3($id_artikel)
	{
		if (!$this->produk_admmodel->DetailData3($id_artikel)) {
			abort(404);
		}
		$data = [

			'artikel1' => $this->produk_admmodel->DetailData3($id_artikel),
		];
	}

  public function add_artikel()
	{
		return view('/admin.v_add_artikel');
	}

	public function insert_artikel()
	{
		Request()->validate
		([
			'judul_artikel' => 'required',
			'isi' => 'required',
			'cover' => 'required|mimes:jpg,jpeg,png,svg',
		]);

		//upload gambar
		$file = Request()->cover;
		$fileName = Request()->judul_artikel.'.'. $file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[

			'judul_artikel' => Request()->judul_artikel,
			'isi' => Request()->isi,
			'cover'=>$fileName  
		];
			$this->produk_admmodel->addData3($data);
			return redirect()->route('artikel')->with('pesan','ARTIKEL BERHASIL DI TAMBAHKAN');
	}

	public function edit3($id_artikel)
	{ 
		if (!$this->produk_admmodel->DetailData3($id_artikel)) {
			abort(404);
		}
		$data = [
			'artikel1' => $this->produk_admmodel->DetailData3($id_artikel),
		];

		return view('admin/v_editartikel',$data);
	}

	public function update3($id_artikel)
	{
		if (Request()->cover) {
		Request()->validate
		([
			'judul_artikel' => 'required',
			'isi' => 'required',
			'cover' => 'mimes:jpg,jpeg,png,svg',
		]);

		//upload gambar
		$file = Request()->cover;
		$fileName = Request()->judul_artikel.'.'. $file->extension();
		$file->move(public_path('img'), $fileName);

		$data = 
		[

			'judul_artikel' => Request()->judul_artikel,
			'isi' => Request()->isi,
			'cover'=>$fileName  
		];
			$this->produk_admmodel->editData3($id_artikel,$data);
		}else {
			$data = 
		[

			'judul_artikel' => Request()->judul_artikel,
			'isi' => Request()->isi,
		];
			$this->produk_admmodel->editData3($id_artikel,$data);
		}
		
			return redirect()->route('artikel')->with('pesan','ARTIKEL BERHASIL DI UPDATE');
	}


	public function delete3($id_artikel)
	{

		//delete foto dalam folder

			$cov = $this->produk_admmodel->DetailData3($id_artikel);
			if ($cov->cover <> " ") {
				unlink(public_path('/img').'/'.$cov->cover);
			}

			$this->produk_admmodel->deleteData3($id_artikel);
			return redirect()->route('artikel')->with('pesan','ARTIKEL BERHASIL DI HAPUS');

	}

}
