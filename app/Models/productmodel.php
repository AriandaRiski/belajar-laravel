<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class productmodel extends Model
{
  public function AllData()
  {
  	return DB::table('tbl_produk')->get();
  }

  public function AllData_artikel()
  {
  	return DB::table('artikel')->get();
  }
}
