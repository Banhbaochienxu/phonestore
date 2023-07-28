<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    public function getAllCategory(){
        return DB::table($this->table)
        ->get();
    }
}
