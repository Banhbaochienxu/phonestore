<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    <header style="padding: 12px" class="bg-primary text-white">
        <div class="row">
            <div class="col-8">

            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                  </div>                              
            </div>
        </div>
    </header>
    <div style="max-width: 1280px;" class="container-md mx-0">
        <div class="row">
            <div style="height: 92vh" class="col-sm-2 bg-primary text-white p-0">
                @include('layouts.main_sitebar')
            </div>
            <div class="col-sm-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
@stack('js')
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>