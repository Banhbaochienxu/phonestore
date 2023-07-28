@extends('layouts/layout')

@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container px-0">
        <div class="row">
            <div class="col-lg-8 px-0 my-2">
                {{-- <img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2023/05/w800/nubia-red-magic-8-pro-plus.jpg.webp"> --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2023/05/w800/nubia-red-magic-8-pro-plus.jpg.webp" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2023/02/w800/banner-realme-q5-pro.jpg.webp" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2023/06/w800/17-gt-neo-5-se.jpg.webp" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-lg-4 px-0">

            </div>
        </div>
        @if (!empty($product_list))
        <div class="row">
            @foreach ($product_list as $item)
                <div class="border col-lg-3 py-2 my-1">
                        <img style class="py-2" src="{{ asset('img/'.$item->img) }}" width="100%" height="250px">
                        <h5 style="height: 80px">{{ $item->product_name }}</h5>
                        <p style="color: red">{{ $item->price }} đ</p>
                        <button class="btn btn-info">Mua ngay</button>
                        @if (Auth::check())
                        <button class="btn btn-info">Thêm vào giỏ</button>     
                        @endif
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection