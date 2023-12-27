<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">

                <span class="brand-text font-weight-light">My Social Media App</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link">
                                <i class="fas fa-user-circle"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin#category')}}" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin#post')}}" class="nav-link">
                                <i class="fa-solid fa-signs-post"></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin#list')}}" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin#trendPost')}}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>
                                    Trending
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="POST" class="nav-link">
                                @csrf
                                <i class="fas fa-sign-out-alt"></i>
                                <button type="submit" class="btn btn-dark"> LogOut</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row mt-4">
                        @yield('content')
                    </div>
                </div>
        </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
</body>

</html>
