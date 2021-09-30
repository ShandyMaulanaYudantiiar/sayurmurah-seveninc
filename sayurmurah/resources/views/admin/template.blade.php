<!DOCTYPE html>
<html lang="en">

<head>
    <title>sayurmurah.com</title>
    @include('admin.template.head')
</head>

<body>
    @include('admin.template.sidebar')
    {{-- @include('admin.pasar') --}}
    <!-- Main content -->
    <div class="main-content" id="panel">
        @include('admin.template.topbar')
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.show') }}"><i
                                                class="fas fa-home"></i></a></li>
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                    @yield('statistik')
                </div>
            </div>
        </div>
        @yield('page-content')
        @include('admin.template.footer')
</body>

</html>
