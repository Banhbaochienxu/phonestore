<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class HomeController extends Controller
{
    private $product;
    public function __construct(){
        $this->product = new Product();
        
    }
    public function index(){

        $product_list = $this->product->getAllProduct();
        return view('home',compact('product_list'));
    }
}
