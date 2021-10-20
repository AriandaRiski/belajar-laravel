<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class galerymodel extends Model
{
  public function AllData()
  {
  	return DB::table('tbl_galeri')->get();
  }

  public function DetailData($id_galeri)
  {
  	return DB::table('tbl_galeri')->where('id_galeri',$id_galeri)->first(); 
  }

}
