@extends('User.Layouts.Master')
@section('content')
  <script>
    @if (session('success'))
    swal({
      title   : "Berhasil",
      text    : "{{session('success')}}",
      icon    : "success",
    })
    @endif
  </script>
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Data Sekolah</h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="panel well">
              <a href="/data-sekolah/tambah">
                <button class="btn btn-labeled btn-info" type="button">
                  <span class="btn-label"><i class="fa fa-plus"></i>
                </span><b>Tambah Data</b></button>
              </a>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="datatable2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NPSN</th>
                        <th>NSS</th>
                        <th>Nama Sekolah</th>
                        {{-- <th>Kepala Sekolah</th> --}}
                        <th>Jenjang</th>
                        <th>Status</th>
                        {{-- <th>Kelurahan</th> --}}
                        <th>Nomor Telepon</th>
                        <th>E-Mail</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      @foreach ($Sekolah as $DataSekolah)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataSekolah->npsn}}</td>
                          <td>{{$DataSekolah->nss}}</td>
                          <td>{{$DataSekolah->nama_sekolah}}</td>
                          {{-- <td>{{$DataSekolah->Pegawai->nama}}</td> --}}
                          <td>{{$DataSekolah->Jenjang->nama_jenjang}}</td>
                          <td>{{$DataSekolah->Status->nama_status}}</td>
                          {{-- <td>{{$DataSekolah->Kelurahan->nama_kelurahan}}</td> --}}
                          <td>{{$DataSekolah->no_telepon}}</td>
                          <td>{{$DataSekolah->email}}</td>
                          <td>
                            <button class="btn btn-labeled btn-info" type="button"
                            onclick="Info('{{Crypt::encryptString($DataSekolah->id)}}', '{{$DataSekolah->nama_sekolah}}')">
                              <span class="btn-label"><i class="fa fa-info"></i>
                            </span><b>Info</b></button>
                            <button class="btn btn-labeled btn-primary" type="button"
                            onclick="Ubah('{{Crypt::encryptString($DataSekolah->id)}}', '{{$DataSekolah->nama_sekolah}}')">
                              <span class="btn-label"><i class="fa fa-pencil"></i>
                            </span><b>Edit</b></button>
                            {{-- <button class="btn btn-labeled btn-danger" type="button" {{$DataSekolah->id == '0' ? 'disabled' : ''}}
                            onclick="{{count($DataSekolah->Sekolah) == 0 ? 'Hapus' : 'cantHapus'}}('{{Crypt::encryptString($DataSekolah->id)}}', '{{$DataStatus->nama_status}}')">
                              <span class="btn-label"><i class="fa fa-close"></i>
                            </span><b>Hapus</b></button> --}}
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
     </div>
  </section>
@endsection
<script>
  function Info(id,Nama)
  {
    swal({
      title   : "Ubah",
      text    : "Anda Akan di Arahkan ke Halaman Info Sekolah '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-sekolah/"+id+"/info";
  }

  function Ubah(id,Nama)
  {
    swal({
      title   : "Ubah",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Sekolah '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-sekolah/"+id+"/edit";
  }

  function Hapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Status Sekolah '"+Nama+"' ?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Hapus",
      ],
    })
    .then((hapus) => {
      if (hapus) {
        swal({
          title  : "Hapus",
          text   : "Data Status Sekolah '"+Nama+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/data-status-sekolah/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Status Sekolah '"+Nama+"' Batal di Hapus",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }

  function cantHapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Data Status Sekolah '"+Nama+"' Tidak dapat di Hapus Karena Ada Data Sekolah",
      icon    : "error",
    })
  }
</script>
