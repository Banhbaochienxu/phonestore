<ul class="nav flex-column bg-primary sitebar">
    <li class="nav-item nav-main">
      <a class="nav-link text-light{{ $active=='product'?' actived':false }}" aria-current="page" href="{{ route('product.index') }}">Sản phẩm</a>
    </li>
    <li class="nav-item nav-main">
      <a class="nav-link text-light {{ $active=='brand'?' actived':false }}" href="{{ route('brand.index') }}">Thương hiệu</a>
    </li>
    <li class="nav-item nav-main">
      <a class="nav-link text-light {{ $active=='category'?' actived':false }}" href="{{ route('category.index') }}">Loại</a>
    </li>
    <li class="nav-item nav-main">
      <a class="nav-link text-light {{ $active=='order'?' actived':false }}" href="{{ route('category.index') }}">Hóa đơn</a>
    </li>
    <li class="nav-item nav-main">
      <a class="nav-link text-light {{ $active=='user'?' actived':false }}" href="{{ route('category.index') }}">Quản lí tài khoản</a>
    </li>
  </ul>