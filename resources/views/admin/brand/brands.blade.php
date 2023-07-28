@extends('layouts.layout_admin')

@section('content')
    <h3 class="text-center my-3" >Quản lí thương hiệu</h3>
        @if (session('msg'))
        <div class="row">
            <div class="alert alert-{{ session('status') }} col-3 ms-3">
                {{ session('msg') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger col-3 ms-3">Vui lòng kiểm tra lại dữ liệu!</div>
        </div>
    @endif
    <a href="{{ route('brand.getadd') }}" class="btn btn-success my-3">+</a>
    <form action="" method="get">
    <div class="row">
                <div class="col-4">
                    <input placeholder="Tìm kiếm sản phẩm..." type="text" class="form-control" name="keywords" value="{{ request()->keywords }}">
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    @if ($allBrand->count()>0)
    <div class="row">
        <div class="col-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="50">STT</th>
                        <th><a href="?sort-by=brand_name&sort-type={{ $sortType ?? ''}}">Tên Thương hiệu</a></th>
                        <th width="100">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $index = 0;
                @endphp
                  @foreach ($allBrand as $item)
                    <tr>
                      <td>{{ ++$index }}</td>
                      <td>{{ $item->brand_name }}</td>
                      <td>
                          <div class="row">
                              <div class="col-6">
                                <a href="{{ route('brand.edit',['id'=>$item->id]) }}" class="btn btn-secondary">Sửa</a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('brand.delete',['id'=>$item->id]) }}" method="post">
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
        </div>
        <div class="col-6">
            <div class="container">
                @if (isset($addStatus))
            <form method="POST">
                <h3>Thêm Thương hiệu</h3>
                <input type="text" class="form-control" placeholder="Ex: Samsung...." name="brand_name" value="{{ old('brand_name') }}">
                <div class="form-text" >Nhập tên thương hiệu</div>
                @csrf
                <button type="submit" class="btn btn-primary">Thêm</button>
                @error('brand_name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </form>              
            @endif
            @if (isset($editStatus))
            <form method="POST" action="{{ route('brand.update') }}">
                @method('put')
                <h3>Cập nhật Thương hiệu</h3>
                <input type="text" class="form-control" placeholder="Ex: Samsung...." name="brand_name" value="{{ old('brand_name') ?? $brandDetail->brand_name }}">
                <div class="form-text" >Nhập tên thương hiệu</div>
                @csrf
                <button type="submit" class="btn btn-primary">Xác nhận</button>
                @error('brand_name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </form>              
            @endif
            </div>          
        </div>
    </div>
    @endif
@endsection