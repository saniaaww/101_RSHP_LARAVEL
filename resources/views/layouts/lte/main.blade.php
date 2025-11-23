@include('layouts.lte.head')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

    @include('layouts.lte.navbar')

    @include('layouts.lte.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('layouts.lte.footer')

</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
