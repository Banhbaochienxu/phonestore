<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
    use HasFactory;
    
    protected $table = 'product';

    public function getAllProduct($filter = [],$keywords = null,$sortBy = null,$sortArr = [],$pageNumber = null){
       $products =  DB::table($this->table)
       ->select('product.*','brand.brand_name as brand_name','category.category_name as category_name')
       ->join('brand','product.brand_id','=','brand.id')
       ->join('category','product.category_id','=','category.id');

       $sortBy = 'create_at';
       $sortType = 'DESC';
       if(!empty($sortArr) && is_array($sortArr)){
           if(!empty($sortArr['sortBy']) && !empty($sortArr['sortType'])){
               $sortBy = $sortArr['sortBy'];
               $sortType = $sortArr['sortType'];
           }
       }

       $products = $products->orderBy('product.'.$sortBy,$sortType);
        
       if(!empty($filter)){
           $products = $products->where($filter);     
       }

       if(!empty($keywords)){
           $products = $products->where(function($query) use($keywords){
                $query->orWhere('product_name','like','%'.$keywords.'%');
                $query->orWhere('price','like','%'.$keywords.'%');
                $query->orWhere('color','like','%'.$keywords.'%');
           });
       }

    

    // phân trang
    if(!empty($pageNumber)){
        $products = $products->paginate($pageNumber)
        //với kết quả tìm kiếm 
        ->withQueryString();
    }
    else{
        $products = $products->get();
    }

       return $products;
    }

    public function addProduct($data){
        
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id){
        return DB::table($this->table)->where('id',$id)->get();
    }
}
