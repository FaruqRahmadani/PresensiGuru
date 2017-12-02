<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Presensi Guru</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="/Public-User/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="/Public-User/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="/Public-User/vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="/Public-User/vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->

   <!-- CHOSEN-->
   <link rel="stylesheet" href="/Public-User/vendor/chosen_v1.2.0/chosen.min.css">
   <!-- SELECT2-->
   <link rel="stylesheet" href="/Public-User/vendor/select2/dist/css/select2.css">
   <link rel="stylesheet" href="/Public-User/vendor/select2-bootstrap-theme/dist/select2-bootstrap.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="/Public-User/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="/Public-User/css/app.css" id="maincss">

   <!-- =============== TAMBAHAN NIH ===============-->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<table class="table table-hover">
  <tbody>
    <tr>
       <td>NPSN</td>
       <td>{{$Sekolah->npsn}}</td>
    </tr>
    <tr>
       <td>NSS</td>
       <td>{{$Sekolah->nss}}</td>
    </tr>
    <tr>
       <td>Nama Sekolah</td>
       <td>{{$Sekolah->nama_sekolah}}</td>
    </tr>
    <tr>
       <td>Kepala Sekolah</td>
       <td>{{$Sekolah->pegawai_id != 0 ? $Sekolah->Pegawai->nama : '-'}}</td>
    </tr>
    <tr>
       <td>Jenjang</td>
       <td>{{$Sekolah->Jenjang->nama_jenjang}}</td>
    </tr>
    <tr>
       <td>Status</td>
       <td>{{$Sekolah->Status->nama_status}}</td>
    </tr>
    <tr>
       <td>Kelurahan</td>
       <td>{{$Sekolah->Kelurahan->nama_kelurahan}}</td>
    </tr>
    <tr>
       <td>Nomor Telepon</td>
       <td>{{$Sekolah->no_telepon}}</td>
    </tr>
    <tr>
       <td>E-Mail</td>
       <td>{{$Sekolah->email}}</td>
    </tr>
  </tbody>
</table>
<script src="/Public-User/vendor/modernizr/modernizr.custom.js"></script>
<!-- MATCHMEDIA POLYFILL-->
<script src="/Public-User/vendor/matchMedia/matchMedia.js"></script>
<!-- JQUERY-->
<script src="/Public-User/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/Public-User/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/Public-User/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
<!-- JQUERY EASING-->
<script src="/Public-User/vendor/jquery.easing/js/jquery.easing.js"></script>
<!-- ANIMO-->
<script src="/Public-User/vendor/animo.js/animo.js"></script>
<!-- SLIMSCROLL-->
<script src="/Public-User/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<!-- SCREENFULL-->
<script src="/Public-User/vendor/screenfull/dist/screenfull.js"></script>
<!-- LOCALIZE-->
<script src="/Public-User/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
<!-- RTL demo-->
<script src="/Public-User/js/demo/demo-rtl.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- CHOSEN-->
<script src="/Public-User/vendor/chosen_v1.2.0/chosen.jquery.min.js"></script>
<!-- SELECT2-->
<script src="/Public-User/vendor/select2/dist/js/select2.js"></script>
<!-- DATATABLES-->
<script src="/Public-User/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/Public-User/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
<script src="/Public-User/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.bootstrap.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.colVis.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.flash.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.html5.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.print.js"></script>
<script src="/Public-User/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/Public-User/vendor/datatables-responsive/js/responsive.bootstrap.js"></script>
<script src="/Public-User/js/demo/demo-datatable.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="/Public-User/js/app.js"></script>
