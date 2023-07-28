<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
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
            $allCategory = Category::where('category_name','like','%'.$keywords.'%')
            ->get();
        }
        $active = 'category';
        $allCategory = Category::orderBy($sortBy,$sortType)->get();

        return view('admin.category.categorys', compact('allCategory','sortType','active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'category';
        $allCategory = Category::all();
        $addStatus = true;
        return view('admin.category.categorys', compact('addStatus','allCategory','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('category.index')->with('msg','Thêm thành công')->with('status','success');
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
    public function edit(Request $request,string $id)
    {
        $active = 'category';
        $categoryDetail = Category::find($id);
        if(!empty($id) && !empty($categoryDetail)){
            $allCategory = Category::all();
            $request->session()->put('id',$id);   
            $editStatus = true;
        }
        else{
            return redirect()->route('category.index')->with('msg','Thương hiệu không tồn tại!')->with('status','danger');
        }

        return view('admin.category.categorys',compact('categoryDetail','allCategory','editStatus','active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
