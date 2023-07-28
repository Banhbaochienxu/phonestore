@extends('layouts/layout')
@section('title')
    Đăng nhập
@endsection
@section('css')
    <style>
        .login{
    background: rgba(255, 255, 255, 0.7);
    color: rgb(0, 0, 0);
    border-radius: 10px;
}

.input{
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    width: 300px;
    margin-left: 50%;
    transform: translateX(-50%);
    height: 50px;
    transition: all 0.5s ease-in-out;
}
.input:focus{
    outline: none;
    border-bottom: 2px solid rgb(83, 106, 236);
}

.form-group{
    position: relative;
}

.label{
    position: absolute;
    top: 12px;
    left: 40px;
    pointer-events: none;
    transition: all 0.3s ease-in-out;
}

.form-group input:focus + .label, .form-group input:valid + .label{
    top: -15px;
    font-size: 0.75rem;
    font-weight: 500;
    color: rgb(83, 106, 236);
}
.mess{
    transform: translateX(-102%);
    transition: all 0.3s ease-in-out;
}
.notification{
    position: fixed;
    top: 15px;
    right: 15px;
}
    </style>
@endsection

@section('content')
@if (session('msg'))
      <div class="notification">
          <div class="alert alert-{{ session('status') }}">{{ session('msg') }}
            <button style="font-size: 0.75rem;" type="button" class="btn-close js-thoat" aria-label="Close"></button>
          </div>
      </div>
@endif
<div class="d-flex align-items-center flex-column my-4">
    <form action="{{ route('postlogin') }}" method="post" style="width:400px;" class="border m-auto p-2 shadow login">
        @csrf
      <h5 class="text-center m-4">ĐĂNG NHẬP</h5>
      <div class="form-group my-3">
        <input required="true" type="text" class="input" id="email" name="email" value="{{ old('email') }}">
        <label class="label" for="email">Email</label>
        @error('email')
            <span style="color: red; font-size: 0.75rem; margin-left:40px">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group my-3">
        <input required="true" type="password" class="input" id="pwd" name="pwd">
        <label class="label" for="pwd">Password</label>
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input style="margin-left:20px;" class="form-check-input" name="remember" id="remember" type="checkbox">
          <p style="margin-left:45px;">Ghi nhớ</p>
        </label>
      </div>
      <button style="width:300px;" type="submit" class="btn btn-info input my-1" name="login" value="login">Đăng nhập</button>
      <a style="margin-right: 2.5rem;text-decoration: none" class="float-end" href="{{ route('getRegister') }}">Đăng kí</a>
    </form>
</div>
@endsection