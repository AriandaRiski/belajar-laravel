<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class produk_admmodel extends Model
{
  //PRODUK CRUD
	public function alldata()
	{
  	return DB::table('tbl_produk')->get();
    }

    public function addData($data)
    {
  	return DB::table('tbl_produk')->insert($data);
    }

    public function DetailData($id_produk)
    {
      return DB::table('tbl_produk')->where('id_produk',$id_produk)->first(); 
    }

    public function editData($id_produk, $data)
    {
    return DB::table('tbl_produk')->where('id_produk',$id_produk)->update($data);

    }

    public function deleteData($id_produk)
    {
    return DB::table('tbl_produk')->where('id_produk',$id_produk)->delete();
    }

    //GALERI CRUD
    public function alldata2()
   {
    return DB::table('tbl_galeri')->get();
    }

    public function addData2($data)
    {
      return DB::table('tbl_galeri')->insert($data);
    }

     public function DetailData2($id_galeri)
    {
      return DB::table('tbl_galeri')->where('id_galeri',$id_galeri)->first(); 
    }

    public function editData2($id_galeri, $data)
    {
    return DB::table('tbl_galeri')->where('id_galeri',$id_galeri)->update($data);

    }
    public function deleteData2($id_galeri)
    {
    return DB::table('tbl_galeri')->where('id_galeri',$id_galeri)->delete();
    }


    //CRUD ARTIKEL
    public function alldata3()
    {
    return DB::table('artikel')->get();
    }

    public function addData3($data)
    {
    return DB::table('artikel')->insert($data);
    }

    public function DetailData3($id_artikel)
    {
      return DB::table('artikel')->where('id_artikel',$id_artikel)->first(); 
    }

    public function editData3($id_artikel, $data)
    {
    return DB::table('artikel')->where('id_artikel',$id_artikel)->update($data);
    }

    public function deleteData3($id_artikel)
    {
    return DB::table('artikel')->where('id_artikel',$id_artikel)->delete();
    }
}
