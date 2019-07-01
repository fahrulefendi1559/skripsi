<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.1/dashboard_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jan 2019 10:33:12 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Digitalisasi Arsip Surat</title>

    <meta name="csrf-token" content="">
    <link href="{{ asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/jquery-ui/jquery-ui.css')}}">
    <!-- data table -->
    <link href="{{ asset('asset/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{ asset('asset/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">
    <!-- date picker -->
    <link href="{{ asset('asset/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
       

</head>

<body>

    <!-- Mainly scripts -->
    <script src="{{ asset('asset/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ asset('asset/js/popper.min.js')}}"></script>
    <script src="{{ asset('asset/js/bootstrap.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('asset/jquery-ui/jquery-ui.js')}}"></script>
    
    <script src="{{ asset('asset/js/inspinia.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/pace/pace.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('asset/js/app.js')}}"></script>
    <script src="{{asset('asset/js/plugins/iCheck/icheck.min.js')}}"></script>


    
    
    <div id="wrapper">
        <!-- Sidebar -->
    @include('partials.sidebar')

    <div id="page-wrapper" class="gray-bg">
        <!-- Header -->  
    @include('partials.header')

        <div class="wrapper wrapper-content">
           @yield('content')
        </div>

        
    @include('partials.footer')
    </div>
    </div>

    
   <!-- Flot -->
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/flot/jquery.flot.time.js')}}"></script>

    <!-- Peity -->
    <script src="{{ asset('asset/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('asset/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
   

    <!-- jQuery UI -->
    <script src="{{ asset('asset/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('asset/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('asset/js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('asset/js/demo/sparkline-demo.js')}}"></script>

     <!-- Data Table  -->
    <script src="{{asset('asset/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('asset/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Sweet alert -->
    <script src="{{ asset('asset/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- datepicker -->
    <script src="{{asset('asset/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    

    
    


</body>
</html>
