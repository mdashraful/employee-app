<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('admin') }}/css/themify-icons/css/themify-icons.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="{{ asset('admin') }}/css/app.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/custom.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/scss/custom.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @stack('css')
    <!-- end of global css -->
    <style>
        
    </style>
</head>

<body class="skin-default">
    <div class="preloader">
        <div class="loader_img"><img src="{{ asset('admin') }}/img/loader.gif" alt="loading..." height="64"
                width="64"></div>
    </div>
    <!-- header logo: style can be found in header-->
    @include('admin.layout.inc.nav')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar-->
            @include('admin.layout.inc.sidebar')
            <!-- /.sidebar -->
        </aside>
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>@yield('header')</h1>
                <ol class="breadcrumb">
                    <li>@yield('tagline')</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->


        </aside>
        <!-- /.right-side -->
    </div>
    <!-- /.right-side -->
    <!-- ./wrapper -->
    <!-- global js -->
    <script src="{{ asset('admin') }}/js/app.js" type="text/javascript"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script> -->
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @stack('js')
    <!-- end of page level js -->
    <script>
        
    </script>
</body>

</html>
