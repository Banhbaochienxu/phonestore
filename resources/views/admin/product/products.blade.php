@extends('layouts.layout_admin')

@section('content')
    <h3 class="text-center my-3" >Quản lí sản phẩm</h3>
    @if (session('msg'))
        <div class="row">
            <div class="alert alert-success col-3 ms-3">
                {{ session('msg') }}
            </div>
        </div>
    @endif
    <a href="{{ route('product.getadd') }}" class="btn btn-success my-3">+</a>
    <form action="" method="get">
        <div class="row">
            <div class="col-3">
                <select class="form-select" id="brand" name="brand">
                    <option value="0">Thương hiệu...</option>
                    @foreach ($brand_list as $item)
                        <option value="{{ $item->id }}"{{ request()->brand==$item->id?'selected':false }}>{{ $item->brand_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <select class="form-select" id="category" name="category">
                    <option value="0">Loại sản phẩm...</option>
                    @foreach ($category_list as $item)
                        <option value="{{ $item->id }}"{{ request()->category==$item->id?'selected':false }}>{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <input placeholder="Tìm kiếm sản phẩm..." type="text" class="form-control" name="keywords" value="{{ request()->keywords }}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </form>
    @if (!empty($product_list))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="220"><a href="?sort-by=product_name&sort-type={{ $sortType }}">Tên sản phẩm</a></th>
                    <th>Màu sắc</th>
                    <th>bộ nhớ</th>
                    <th><a href="?sort-by=price&sort-type={{ $sortType ?? ''}}">giá bán</a></th>
                    <th><a href="?sort-by=quantity&sort-type={{ $sortType ?? ''}}">Số lượng</a></th>
                    <th>Thương hiệu</th>
                    <th>loại</th>
                    <th>hình ảnh</th>
                    <th width="100">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_list as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->memory }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td> {{  $item->brand_name }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td><img src="{{ asset('img/'.$item->img) }}" alt="" width="50px"></td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('product.edit',['id'=>$item->id]) }}" class="btn btn-secondary">Sửa</a>
                                </div>
                                <div class="col-6">
                                    <form method="post" class="" action="{{ route('product.delete',['id'=>$item->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('bạn có chắc muốn xóa?')" type="submit" class="btn btn-secondary">Xóa</button>
                                    </form>
                                </div>
                            </div>                     
                        </td>
                    </tr>           
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $product_list->links() }}
        </div>
    @endif
@endsection