<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    const UPDATED_AT = 'update_at';
    const CREATED_AT = 'create_at';

    public function getAllCategory(){
        return DB::table($this->table)
        ->get();
    }
}
