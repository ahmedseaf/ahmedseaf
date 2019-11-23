<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo assets('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') ; ?>">
    <link rel="stylesheet" href="<?php echo assets('plugins/bootstrap-slider/css/bootstrap-slider.min.css') ; ?>">
    <link rel="stylesheet" href="<?php echo assets('plugins/fontawesome-free/css/all.min.css') ; ?>">


    <link rel="stylesheet" href="<?php echo assets('plugins/select2/css/select2.min.css') ; ?>">
    <link rel="stylesheet" href="<?php echo assets('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ; ?>">
    <!-- Bootstrap4 Duallistbox -->


    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo assets('plugins/ekko-lightbox/ekko-lightbox.css') ; ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo assets('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ; ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo assets('plugins/toastr/toastr.min.css') ; ?>">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="<?php echo assets('plugins/ion-rangeslider/css/ion.rangeSlider.min.css') ; ?>">
    <!-- bootstrap slider -->

    <link rel="stylesheet" href="<?php echo assets('plugins/datatables-bs4/css/dataTables.bootstrap4.css') ; ?>">



    <!-- Font Awesome -->
    <!-- Ionicons -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo assets('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo assets('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ; ?>">
    <!-- JQVMap -->
<!--    <link rel="stylesheet" href="--><?php //echo assets('plugins/jqvmap/jqvmap.min.css') ; ?><!--">-->
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo assets('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ; ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo assets('plugins/daterangepicker/daterangepicker.css') ; ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo assets('plugins/summernote/summernote-bs4.css') ; ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets('dist/css/adminlte.min.css') ; ?>">
    <link rel="stylesheet" href="<?php echo assets('dist/css/mystyle.css') ; ?>">


</head>
<body>
<!--<div style="margin-left: 100px;-->
<!--    margin-top: 50px;">-->
<!---->
<!--    --><?php //if($errors) {
//         echo implode('<br>', $errors);
//    } ?>
<!--<form action="--><?php //echo url('/admin/login/submit')  ?><!--" method="post">-->
<!--    <label for="email">Email</label>-->
<!--    <input type="email" name="email" id="email" style="margin-left: 70px;height: 30px"><br><br><br>-->
<!---->
<!--    <label for="password">Password</label>-->
<!--    <input type="password" name="password" id="password" style="margin-left: 46px;height: 30px"><br><br><br>-->
<!---->
<!--    <label for="rememberMe">Remember Me</label>-->
<!--    <input type="checkbox" name="remember" id="rememberMe">  <br><br><br>-->
<!---->
<!--    <button class="btn btn-primary" type="submit" name="submit"  style="width: 190px;-->
<!--    height: 30px;">Submit</button>-->
<!--</form>-->
<!--</div>-->
<!---->






<div class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Tawred</b>.com
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <div class="login-box-msg">
                <div id="login-result"></div>
            </div>

            <form action="<?php echo url('/admin/login/submit')  ?>" method="post" id="login-form">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" id="submit_login" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
</div>
































<script src="<?php echo assets('plugins/jquery/jquery.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/jquery-ui/jquery-ui.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/jquery-knob/jquery.knob.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/bootstrap-switch/js/bootstrap-switch.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/bootstrap-slider/bootstrap-slider.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/bootstrap/js/bootstrap.bundle.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/select2/js/select2.full.min.js') ; ?>"></script>


<script src="<?php echo assets('plugins/moment/moment.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/inputmask/min/jquery.inputmask.bundle.min.js') ; ?>"></script>



<script src="<?php echo assets('plugins/ekko-lightbox/ekko-lightbox.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/sweetalert2/sweetalert2.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/toastr/toastr.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/ion-rangeslider/js/ion.rangeSlider.min.js') ; ?>"></script>


<script src="<?php echo assets('plugins/datatables/jquery.dataTables.js') ; ?>"></script>
<script src="<?php echo assets('plugins/datatables-bs4/js/dataTables.bootstrap4.js') ; ?>"></script>

<script src="<?php echo assets('plugins/flot/jquery.flot.js'); ?>"></script>

<script src="<?php echo assets('plugins/flot-old/jquery.flot.resize.min.js'); ?>"></script>

<script src="<?php echo assets('plugins/flot-old/jquery.flot.pie.min.js'); ?>"></script>



<script src="<?php echo assets('plugins/chart.js/Chart.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/sparklines/sparkline.js') ; ?>"></script>



<script src="<?php echo assets('plugins/moment/moment.min.js') ; ?>"></script>
<script src="<?php echo assets('plugins/daterangepicker/daterangepicker.js') ; ?>"></script>

<script src="<?php echo assets('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/summernote/summernote-bs4.min.js') ; ?>"></script>

<script src="<?php echo assets('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ; ?>"></script>
<script src="<?php echo assets('dist/js/adminlte.js') ; ?>"></script>
<script src="<?php echo assets('dist/js/pages/dashboard.js') ; ?>"></script>
<script src="<?php echo assets('dist/js/demo.js') ; ?>"></script>
<script src="<?php echo assets('dist/js/myjs.js') ; ?>"></script>
<!--<script src="--><?php //echo assets('plugins/jqvmap/jquery.vmap.min.js') ; ?><!--"></script>-->
<!--<script src="--><?php //echo assets('plugins/jqvmap/maps/jquery.vmap.usa.js') ; ?><!--"></script>-->





<script> // For TextArea
    $(function () {
        $('.textarea').summernote()
    })
</script>



</body>
</html>