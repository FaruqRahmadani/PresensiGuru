<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Aplikasi Presensi Dinas Pendidikan Kab. Banjar</title>
  <link rel="icon" type="image/png" href="{{asset('images/logo/lg2.png')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  @yield('content')
</body>
<script src="{{asset('js/app.js')}}"></script>
@if ($errors->count())
  <script>notif('error', 'Tidak Dapat Login', '{{$errors->first()}}')</script>
@endif
@if (session('alert'))
  <script>notif('{{session('tipe')}}', '{{session('judul')}}', '{{session('pesan')}}')</script>
@endif
</body>

</html>
