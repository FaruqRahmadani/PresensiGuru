<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Angle - Bootstrap Admin Template</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="/Public-Depan/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="/Public-Depan/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="/Public-Depan/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="/Public-Depan/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <h4>PRESENSI</h4>
            </div>
            <div class="panel-body">
               <p class="text-center pv">Login</p>
                 <form class="mb-lg" role="form" data-parsley-validate="" novalidate="" method="POST" action="{{ route('login') }}">

                 {{ csrf_field() }}
                  <div class="form-group has-feedback">
                     <input class="form-control" id="exampleInputEmail1" type="text" name="username" placeholder="Username" autocomplete="off" required>
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password" required>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                     </div>
                     <div class="pull-right"><a class="text-muted" href="recover.html">Forgot your password?</a>
                     </div>
                  </div>
                  <button class="btn btn-block btn-primary mt-lg" type="submit">Login</button>
               </form>
            </div>
         </div>
         <!-- END panel-->
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2017</span>
            <span>-</span>
            <span>Angle</span>
            <br>
            <span>Bootstrap Admin Template</span>
         </div>
      </div>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="/Public-Depan/vendor/modernizr/modernizr.custom.js"></script>
   <!-- JQUERY-->
   <script src="/Public-Depan/vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="/Public-Depan/vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="/Public-Depan/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- PARSLEY-->
   <script src="/Public-Depan/vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="/Public-Depan/js/app.js"></script>
</body>

</html>
