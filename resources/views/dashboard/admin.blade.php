<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @include('imports.css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="dashboard-section">

        <nav class="dashboard-side ">
            <section class="fcol ga-3">

                <section class="dashboard-logo  g-1">
                    <img src="{{ asset('images/smk7-no-bg-logo.png') }}" alt="" width="40">
                    <h5>| SMKN 7</h5>
                </section>

                <section class="dashboard-item-container">
                
                    <a href='{{url("/admin")}}' class="dashboard-item @if(request()->is('*admin') ) -active- @endif  ">
                        <i class="fa-solid fa-dashboard"></i>
                        <h5>Dashboard</h5>
                    </a>
                    <a href='{{url("/admin/teachers")}}' class="dashboard-item @if(request()->is('*admin/teachers*') ) -active- @endif  ">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <h5>Teacher</h5>
                    </a>
                    <a href='{{url("/admin/blogs")}}' class="dashboard-item @if(request()->is('*admin/blogs*') ) -active- @endif  ">
                        <i class="fa-solid fa-newspaper"></i>
                        <h5>Blog</h5>
                    </a>
                </section>
            </section>

            <form action="{{url('/logout')}}" method="post" class="logout-side">
                @csrf

                <button class="frow g-1 aicenter">
                    <i class="fa-solid fa-door-open"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
        <!-- Navbar -->

        <!-- Main Content -->
        <main class="dashboard-main">
                <header class="dashboard-header">
                    <div class="sidebar-button -dark">
                        <i class="fa fa-bars"></i>
                    </div>
                </header>
                @yield('content')
        </main>
    </div>

    <script src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/tabz-dropdown.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
