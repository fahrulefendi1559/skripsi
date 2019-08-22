<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login SIDAS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/jquery-ui/jquery-ui.css')}}">
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

<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('loginstyle/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('loginstyle/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>
                    {{ csrf_field() }}
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100">Username</span>
                        <input  type="text" class="input100" name="username" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" type="password"  class="input100"" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    
                    <div class="text-right p-t-8 p-b-31">
                        <div class="title-action">
                            <a  href="" data-toggle="modal" data-target="#myModal2" onclick="addForm()">Need Help ?</a>
                        </div>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit"class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content animated flipInY">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title"></h4>
                                            <small class="font-bold">Password/Token bermasalah silahkan hubungi Staff BP-KKN
                                            </small>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                    </div>
                            </div>
                        </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>

<script type="text/javascript">
    //date picker tgl terima
    $(function(){
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
    });


    //modalscript
    function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST'); 
        $('#myModal2 form')[0].reset();
        $('.modal-title').text('Input Data Surat Masuk');
    }
</script>

    
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('loginstyle/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('loginstyle/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('loginstyle/js/main.js')}}"></script>

    
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
