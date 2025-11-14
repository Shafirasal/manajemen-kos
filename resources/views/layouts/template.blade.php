<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for AJAX -->

  <!-- Title -->
  <title>@yield('title') &mdash; Stisla</title>

  <!-- General CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/ionicons201/css/ionicons.min.css') }}"> 

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/custom.css') }}">
  
  <!--Chart Js -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.css') }}"> 

    <!-- Template Select2 -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/select2/css/select2.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  


<!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


  @stack('css') <!-- For page-specific CSS -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper">

      <!-- Navbar -->
      @include('layouts.navbar')

      <!-- Sidebar -->
      <div class="main-sidebar sidebar-style-2">
        @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <!-- Footer -->
      @include('layouts.footer')

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="{{ asset('stisla/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Select2-->
  <script src="{{ asset('stisla/assets/select2/js/select2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



  <!-- jQuery Validate -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script> --}}

<script src="{{ asset('stisla/assets/js/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('stisla/assets/js/validate/additional-methods.min.js') }}"></script>


  <!-- DataTables -->
  <script src="{{ asset('stisla/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

  <!-- Stisla Core JS -->
  <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS -->
  <script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/page/components-table.js') }}"></script>

    <!-- SweetAlert2 CDN -->
<script src="{{ asset('stisla/assets/js/sweetalert2.all.min.js') }}"></script>

<!-- Chart js -->
<script src="{{ asset('stisla/modules/chart.min.js') }}"></script>
<script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
{{-- <script src="{{ asset('stisla/js/page/dist/modules-chartjs.js') }}"></script> --}}
{{-- <script src="{{ asset('stisla/assets/js/page/modules-chartjs.js') }}"></script> --}}


  <!-- AJAX CSRF Setup -->
  <script>
    $.ajaxSetup({
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token'),
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>



<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


  @stack('js') <!-- For page-specific JS -->
  @yield('scripts')
</body>
</html>