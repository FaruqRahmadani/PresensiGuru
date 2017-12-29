<head>
  <style media="screen">
    body {
      margin: 20px;
    }
    .header-info > * {
      margin-bottom: -20px;
    }
    .header > img {
      bottom : 10px; 
      height: 80px;
      float : left;
      margin-right: 10px;
    }
    table {
      width: 100%;
      margin: 5px;
    }
    table, th, td {
      border: 2px solid #000000;
      border-collapse: collapse;
    }
  </style>
  <title>
    Rekap Presensi
  </title>
</head>
<body>
  <div class="header">
    <img src="Public/img/logo-banjar.png">
    <div class="header-info">
      <h4><strong>Dinas Pendidikan Kabupaten Banjar</strong></h4>
      <br>
      <span>Laporan Presensi Guru</span>
      <br>
      <span>Periode : {{$Periode}}</span>
      <br>
      <span>Unit Kerja : {{$Sekolah->nama_sekolah}}</span>
    </div>
  </div>
  <hr>
  <table>
    <thead>
      <tr>
        <th style="width: 30px;">No</th>
        <th style="width: 230px;">NIP</th>
        <th>Nama Pegawai</th>
        @foreach ($KategoriAbsen as $DataKategoriAbsen)
          <th style="background-color:{{$DataKategoriAbsen->kode_warna}}; width: 40px; text-align: center;">{{$DataKategoriAbsen->kode}}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @php
        $No = 0;
      @endphp
      @foreach ($Pegawai as $DataPegawai)
        <tr>
          <td style="text-align: center;">{{$No+=1}}</td>
          <td>{{$DataPegawai->nip}}</td>
          <td>{{$DataPegawai->nama}}</td>
          @foreach ($KategoriAbsen as $DataKategoriAbsen)
            <th>{{count($Absensi->where('pegawai_id', $DataPegawai->id)->where('kategori_absen_id', $DataKategoriAbsen->id)->get())}}</th>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
