@extends('layouts/layout')
@section('title')
    Đăng kí
@endsection

@section('content')
    
    <div class="container d-flex justify-content-center mt-5">
        <div class="row">
            <h2 class="text-center">Đăng kí tài khoản</h2>
            <form action="{{ route('postRegister') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên người dùng</label>
                    <input placeholder="Nhập tên người dùng..." class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input placeholder="Nhập Email..." class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="number">Số Điện thoại</label>
                    <input placeholder="Nhập số điện thoại..." class="form-control" type="number" name="number" id="number" value="{{ old('number') }}">
                    @error('number')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input placeholder="Nhập địa chỉ..." class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
                    @error('address')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birthday">Ngày sinh</label>
                    <input placeholder="Nhập ngày sinh..." class="form-control" type="date" name="birthday" id="birthday" value="{{ old('birthday') }}">
                    @error('birthday')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input placeholder="Nhập mật khẩu..." class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Xác nhận mật khẩu</label>
                    <input placeholder="Xác nhận lại mật khẩu..." class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                    @error('confirmPassword')
                        <span style="color: red; font-size: 0.75rem">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-primary mt-2 float-end">Đăng ký</button>
            </form>
        </div> 
    </div>
@endsection