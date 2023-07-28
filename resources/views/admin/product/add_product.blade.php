@extends('layouts.layout_admin')

@section('css')
<style>
    .preview-upload {
        border: 1px dashed rgb(100, 100, 100);
        padding: 10px;
        min-height: 100px;
        min-width: 100px;
    }
    .preview-upload img {
        width: 100%;
    }
</style>
@endsection

@section('content')
    <h3 class='text-center my-3'>Thêm sản phẩm</h3>
    <div class="container">
        @if ($errors->any())
        <div class="row">
            <div class="alert alert-danger col-3">Vui lòng kiểm tra lại dữ liệu!</div>
        </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" required="true" placeholder="Nhập tên sản phẩm..." class="form-control" value="{{ old('name') }}" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Màu sắc</label>
                        <input type="text" required="true" placeholder="Nhập Màu sắc..." class="form-control" value="{{ old('color') }}" name="color" id="color">
                    </div>
                    <div class="mb-3">
                        <label for="memory" class="form-label">Bộ nhớ</label>
                        <input type="text" required="true" placeholder="Nhập Bộ nhớ..." class="form-control" value="{{ old('memory') }}" name="memory" id="memory">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá bán</label>
                        <input type="number" required="true" placeholder="Nhập Giá bán..." class="form-control" value="{{ old('price') }}" name="price" id="price">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Thương hiệu</label>
                        <select class="form-select" id="brand" name="brand">
                            <option value="">Chọn thương hiệu...</option>
                            @foreach ($brand_list as $item)
                                <option value="{{ $item->id }}" {{ old('brand')==$item->id?'selected':false }}>{{ $item->brand_name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Loại</label>
                        <select class="form-select" id="category" name="category">
                            <option value="">Chọn loại sản phẩm...</option>
                            @foreach ($category_list as $item)
                                <option value="{{ $item->id }} {{ old('category')==$item->id?'selected':false }}">{{ $item->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" required="true" placeholder="Nhập Giá bán..." class="form-control" value="{{ old('quantity') }}" name="quantity" id="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Hình ảnh</label>
                        <input required class="form-control" type="file" id="img" name="img">
                        @error('img')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="preview-upload">
                        <img id='sp_hinh-upload'/>                     
                    </div>
                </div>
            </div>      
            <button type="submit" class="btn btn-primary">Hoàn thành</button>
            <a class="btn btn-danger" href="{{ route('product.index') }}">Quay lại</a>
        </form>
    </div>
@endsection

@push('js')
<script>
    // Sử dụng FileReader để đọc dữ liệu tạm trước khi upload lên Server
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#sp_hinh-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Bắt sự kiện, ngay khi thay đổi file thì đọc lại nội dung và hiển thị lại hình ảnh mới trên khung preview-upload
    
    $("#img").change(function(){
        readURL(this);
    }); 
</script>
@endpush