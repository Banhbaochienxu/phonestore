<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    // mặc định id là khóa chính 
    protected $primaryKey = 'id';


    public $timestamps =true;

    const UPDATED_AT = 'update_at';
    const CREATED_AT = 'create_at';

    public function getAllBrand(){
        return DB::table($this->table)
        ->get();
    }
}
