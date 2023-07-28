<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;

use App\Http\Requests\BrandRequest;

use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allSortType = ['DESC','ASC'];

        if(!empty($sortType)&&in_array($sortType,$allSortType)){
            if($sortType == 'DESC'){
                $sortType = 'ASC';
            }else{
                $sortType = 'DESC';
            }
        }
        else{
            $sortBy = 'create_at';
            $sortType = 'ASC';
        }

        if(!empty($request->keywords)){
            $keywords = $request->keywords;
            $allBrand = Brand::where('brand_name','like','%'.$keywords.'%')
            ->get();
        }

        $active = 'brand';
        $allBrand = Brand::orderBy($sortBy,$sortType)->get();

        return view('admin.brand.brands', compact('allBrand','sortType','active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'brand';
        $allBrand = Brand::all();
        $addStatus = true;
        return view('admin.brand.brands', compact('addStatus','allBrand','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->save();

        return redirect()->route('brand.index')->with('msg','Thêm thành công')->with('status','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $active = 'brand';
        $brandDetail = Brand::find($id);
        if(!empty($id) && !empty($brandDetail)){
            $allBrand = Brand::all();
            $request->session()->put('id',$id);   
            $editStatus = true;
        }
        else{
            return redirect()->route('brand.index')->with('msg','Thương hiệu không tồn tại!')->with('status','danger');
        }
        return view('admin.brand.brands',compact('brandDetail','allBrand','editStatus','active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request)
    {
        $id = session('id');
        if(empty($id)){
            return redirect()->back()->with('msg','liên kết không tồn tại');
        }
        $brandDetail = Brand::find($id);

        $brandDetail->brand_name = $request->brand_name;

        $brandDetail->save();

        return redirect()->route('brand.index')->with('msg','Cập nhật thanhg công!')->with('status','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = brand::find($id);
        $brand = $brand->delete();
        if($brand){
            return redirect()->back()->with('msg','xóa thành công!')->with('status','success');
        }
        else{
            return redirect()->back()->with('msg','xóa Thất bại!')->with('status','danger');
        }
    }
}
