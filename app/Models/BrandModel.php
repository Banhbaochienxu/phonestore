<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brand';

    public function getAllBrand(){
        return DB::table($this->table)
        ->get();
    }
}
