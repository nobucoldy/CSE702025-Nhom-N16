<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'InvManage') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap CSS (nếu bạn dùng Bootstrap) -->
    <!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /* Nền tổng thể */
    body {
        background: linear-gradient(to right, #f9f9f9, #e9f0ff);
        font-family: 'Nunito', sans-serif;
        color: #333;
    }

    /* Header/navbar */
    .navbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #dee2e6;
    }

    .navbar-brand {
        font-weight: bold;
        color: #007bff !important;
    }

    /* Card */
    .card {
        border-radius: 10px;
        border: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .card-header.bg-gradient-blue {
        background: linear-gradient(135deg, #3f87ff, #65b1ff);
        color: white;
        border-radius: 10px 10px 0 0;
        font-weight: 600;
    }

    /* Table */
    .table th {
        background-color: #f1f5ff;
        font-weight: 600;
        color: #333;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9fcff;
    }

    .table-hover tbody tr:hover {
        background-color: #edf3ff;
    }

    /* Buttons */
    .btn-primary {
        background-color: #3f87ff;
        border-color: #3f87ff;
    }

    .btn-primary:hover {
        background-color: #2c6fd6;
        border-color: #2c6fd6;
    }

    .btn-outline-secondary:hover {
        background-color: #f1f5ff;
    }

    /* Sticky table headers */
    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
    }

    .table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'InvManage') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto">
    <!-- Trang chủ -->
    <li class="nav-item">
        <a class="nav-link px-3" href="{{ url('/') }}">
            <i class="fas fa-home me-1"></i> Trang chủ
        </a>
    </li>
    
    <!-- Danh mục (Dropdown) -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle px-3" href="#" id="catalogDropdown" role="button" 
           data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fas fa-list-alt me-1"></i> Danh mục
        </a>
        <ul class="dropdown-menu shadow-sm" aria-labelledby="catalogDropdown">
            <li>
                <a class="dropdown-item py-2" href="{{ url('/products') }}">
                    <i class="fas fa-box-open me-2"></i> Sản phẩm
                </a>
            </li>
            <li>
                <a class="dropdown-item py-2" href="{{ url('/suppliers') }}">
                    <i class="fas fa-truck me-2"></i> Nhà cung cấp
                </a>
            </li>
           
        </ul>
    </li>
    
    <!-- Tồn kho -->
  
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle px-3" href="#" id="catalogDropdown" role="button" 
           data-bs-toggle="dropdown" aria-expanded="false">
           <i class="bi bi-box-seam"></i> Kho hàng
        </a>
        <ul class="dropdown-menu shadow-sm" aria-labelledby="catalogDropdown">
            <li>
                <a class="dropdown-item py-2" href="{{ url('/inventory') }}">
                    <i class="bi bi-box-seam"></i> Quản lý kho
                </a>
            </li>
            <li>
                <a class="dropdown-item py-2" href="{{ url('/invent/import') }}">
                    <i class="bi bi-box-arrow-in-down"></i> Nhập kho
                </a>
            </li>

            <li>
                <a class="dropdown-item py-2" href="{{ route('invent.export') }}">
                    <i class="bi bi-box-arrow-up"></i> Xuất kho
                </a>
            </li>
           
        </ul>
    </li>
    <!-- Báo cáo -->
<li class="nav-item">
    <a class="nav-link px-3" href="{{ route('invent.exportReport') }}">
        <i class="fas fa-chart-bar me-1"></i> Báo cáo
    </a>
</li>

   
</ul>

<!-- Thêm phần CSS tùy chỉnh -->
<style>
    .navbar-nav {
        font-weight: 500;
    }
    .nav-link {
        border-radius: 4px;
        margin: 0 2px;
        transition: all 0.3s ease;
    }
    .nav-link:hover, .nav-link:focus {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .dropdown-menu {
        border: none;
        min-width: 220px;
    }
    .dropdown-item {
        border-radius: 4px;
        margin: 2px 8px;
        transition: all 0.2s ease;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    @media (max-width: 991.98px) {
        .nav-item {
            margin-bottom: 5px;
        }
    }
</style>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ asset('avar.jpg') }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                <div class="d-flex flex-column align-items-start lh-sm">
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        {{ Auth::user()->is_admin ? 'Admin' : 'User' }}
                                    </small>
                                </div>

</a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @can('isAdmin')
                                        <a class="dropdown-item" href="{{ route('users.index') }}">
                                            <i class=""></i> Người dùng
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>
