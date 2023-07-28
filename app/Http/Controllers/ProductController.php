<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    const _pageNumber = 4;

    public function __construct(){
        $this->product = new Product;
        $this->brand = new Brand;
        $this->category = new Category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // lọc dữ liệu
        $keywords = null;
        $filter = [];
        if(!empty($request->brand)){
            $brand = $request->brand;

            $filter[] = ['product.brand_id' ,'=',$brand];
        }
        if(!empty($request->category)){
            $category = $request->category;

            $filter[] = ['product.category_id' ,'=',$category];
        }
        if(!empty($request->keywords)){
            $keywords = $request->keywords;
        }

        // xử lí sortBy
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allSortType = ['asc','desc'];

        if(!empty($sortType)&&in_array($sortType,$allSortType)){
            if($sortType == 'asc'){
                $sortType = 'desc';
            }else{
                $sortType = 'asc';
            }
        }
        else{
            $sortType = 'asc';
        }

        $sortArr=[
            'sortBy'    => $sortBy,
            'sortType'  => $sortType
        ];

        $active = 'product';
        $brand_list = $this->brand->getAllBrand();
        $category_list = $this->category->getAllCategory();
        $product_list = $this->product->getAllProduct($filter,$keywords,$sortBy,$sortArr,self::_pageNumber);
        return view('admin.product.products',compact('product_list','brand_list','category_list','sortType','active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'product';
        $brand_list = $this->brand->getAllBrand();
        $category_list = $this->category->getAllCategory();
        return view('admin.product.add_product',compact('brand_list','category_list','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {      
        //lưu ảnh vào public
        $request->validate($rule,$message);
        $image = $request->file('img');
        $nameImage = $image->getClientOriginalName().'_'.time();
        $storedPath = $image->move('img', $nameImage);
        
        $data = [
            'product_name' => $request->name,
            'color'        => $request->color,
            'memory'       => $request->memory,
            'price'        => $request->price,
            'brand_id'     => $request->brand,
            'category_id'  => $request->category,
            'quantity'     => $request->quantity,
            'img'          => $nameImage,
            'Create_at'    => date('Y-m-d H:i:s'),
            'Update_at'    => date('Y-m-d H:i:s')

        ];        

        $this->product->addProduct($data);

        return redirect()->route('product.index')->with('msg','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $active = 'product';
        $brand_list = $this->brand->getAllBrand();
        $category_list = $this->category->getAllCategory();
        $product_detail = $this->product->getDetail($id);

        if(!empty($id)&& !empty($product_detail[0])){
            $request->session()->put('id',$id);
            $product_detail = $product_detail[0];
        }
        else{
            return redirect()->route('product.index')->with('msg','Sản phẩm không tồn tại!');
        }
        return view('admin.product.edit_product',compact('brand_list','category_list','product_detail','active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request)
    {
        $id = session('id');
        if(empty($id)){
            return redirect()->back()->with('msg','liên kết không tồn tại');
        }
        if(!empty($request->file('img'))){
            $image = $request->file('img');
            $nameImage = $image->getClientOriginalName().'_'.time();
            $storedPath = $image->move('img', $nameImage);
        }
        else{
            $nameImage = $request->imgOld;
        }
        $data = [
            'product_name' => $request->name,
            'color'        => $request->color,
            'memory'       => $request->memory,
            'price'        => $request->price,
            'brand_id'     => $request->brand,
            'category_id'  => $request->category,
            'quantity'     => $request->quantity,
            'img'          => $nameImage,
            'Update_at'    => date('Y-m-d H:i:s')

        ];    
        
        $this->product->updateProduct($data,$id);


        return redirect()->route('product.index')->with('msg','sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->product->deleteProduct($id);
        return redirect()->route('product.index')->with('msg','Xóa thành công sản phẩm');
    }
}
