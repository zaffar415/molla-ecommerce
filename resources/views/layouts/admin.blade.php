<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Molla Ecommerce') }}</title>
  <link rel="shortcut icon" href="{{ asset('/assets/images/logo_rounded.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('/assets/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/Chart.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }} ">
  <link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('/assets/css/toastr.min.css') }}"> --}}

  <script src="{{ asset('/assets/js/Chart.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li> --}}

        {!! Form::open(['url' => route('logout'), 'method' => 'POST']) !!}
        {!! Form::submit('Logout', ['class' => 'btn text-danger']) !!}
        {!! Form::close() !!}

        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <x-admin-sidebar></x-admin-sidebar>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ ucwords($title) }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ ucwords($title) }}</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-{{ date('Y') }} Remy Cointreau.</strong>
      All rights reserved.
      <p class="float-right">powered by
        <a href="https://froztech.com" target="_blank" class="text-dark">
          <img src="{{ asset('/assets/images/froztech_dark.png') }}" alt="froztech" class="froztech-logo">
        </a>
      </p>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <script src="{{ asset('/assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('/assets/js/daterangepicker.js') }}"></script>
  <script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/assets/js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('/assets/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/select2.min.js') }}"></script>
  {{-- <script src="{{ asset('/assets/js/toastr.min.js') }}"></script> --}}
  @if (request()->is('*dashboard'))
    <script src="{{ asset('/assets/js/dashboard3.js') }}"></script>
  @endif

  <script src="{{ asset('/assets/js/main.js') }}"></script>

  <script>
    $(function() {
      $('.select2').select2({
        theme: 'bootstrap4',
      });

      $('#slug, #name').change((e) => {
        let slug = e.target.value.trim().toLowerCase();
        $('#slug').val(slug.replace(/[^a-zA-Z0-9]+/g,'-'));
      });
    });
  </script>

  @if (Session::has('success'))
    <script>
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        Toast.fire({
          icon: 'success',
          title: "{{ Session::get('success') }}"
        })
      });
    </script>
  @endif

  @if (Session::has('error'))
    <script>
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        Toast.fire({
          icon: 'error',
          title: "{{ Session::get('error') }}"
        })
      });
    </script>
  @endif
  @yield('scripts')


</body>

</html>
