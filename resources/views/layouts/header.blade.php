<header class="p-2 border">
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex align-items-center fs-2">
                <a style="color: #fff; text-decoration: none" href="{{ route('index') }}">MOBIE WORD</a>
            </div>
            <div class="col-4 position-relative">
                <form action="">
                  <img class="search-img" src="{{ asset('img/search.png') }}">
                  <input placeholder="Tìm kiếm sản phẩm....." class="form-control search" type="text">
                </form>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <ul class="nav">
                  @if (Auth::check())
                  <li class="nav-item">
                    <img class="pe-2" width="40px" src="{{ asset('img/cart.png') }}">  
                    <div class="btn-group">
                      <button type="button" class="btn text-light dropdown-toggle btn-header" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}                         
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                      </ul>
                    </div>  
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link active px-1 text-light" aria-current="page" href="{{ route('login') }}">ĐĂNG NHẬP</a>
                  </li>
                  @endif                  
                  <li class="nav-item border-start">
                    <a class="nav-link active px-2 text-light" aria-current="page" href="#">TIN TỨC</a>
                  </li>
                  <li class="nav-item border-start border-end">
                     <a class="nav-link px-2 text-light" href="#">EVENTS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ps-2 pe-0 text-light" href="#">TRA CỨU BH</a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="">
          <ul class="nav nav-header d-flex justify-content-between">
            <li class="nav-item">
              <a class="nav-link nav-classify  mt-3 ps-0" href="#"><img src="{{ asset('img/smartphone.png') }}">  ĐIỆN THOẠI</a>
              <div  style="margin-left: 0px; " class="border-nav"></div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3" href="#"><img src="{{ asset('img/tablet.png') }}"> MÁY TÍNH BẢNG</a>
              <div class="border-nav"></div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3" href="#"><img src="{{ asset('img/tv.png') }}"> TIVI</a>
              <div class="border-nav"></div>   
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3" aria-current="page" href="#"><img src="{{ asset('img/charging.png') }}"> PHỤ KIỆN</a>
              <div class="border-nav"></div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3" href="#"><img src="{{ asset('img/watch.png') }}">  ĐÒNG HỒ THÔNG MINH</a>
              <div class="border-nav"></div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3" href="#"><img src="{{ asset('img/headphone.png') }}">TAI NGHE</a>
              <div class="border-nav"></div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-classify mt-3 pe-0" href="#"><img src="{{ asset('img/repair.png') }}">SỬA CHỬA</a>
              <div style="margin-right: 0px; " class="border-nav"></div>
            </li>
          </ul>
        </div>
    </div>
</header>