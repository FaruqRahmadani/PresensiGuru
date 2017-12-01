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
      <h3>Data Pegawai
      </h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="panel well">
              <a href="/data-pegawai/tambah">
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
                        <th>NIP</th>
                        <th>NUPTK</th>
                        <th>Nama</th>
                        {{-- <th>Tempat, Tanggal Lahir</th> --}}
                        <th>Jenis Kelamin</th>
                        {{-- <th>Nomor Telepon</th> --}}
                        {{-- <th>E-mail</th> --}}
                        <th>Asal Sekolah</th>
                        {{-- <th>ID Sidik Jari</th> --}}
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      @foreach ($Pegawai as $DataPegawai)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataPegawai->nip}}</td>
                          <td>{{$DataPegawai->nuptk}}</td>
                          <td>{{$DataPegawai->nama}}</td>
                          {{-- <td>{{$DataPegawai->tempat_lahir}}, {{Carbon\Carbon::parse($DataPegawai->tanggal_lahir)->format('d-m-Y')}}</td> --}}
                          <td>{{$DataPegawai->jenis_kelamin == '1' ? 'Laki - Laki' : 'Perempuan'}}</td>
                          {{-- <td>{{$DataPegawai->no_handphone}}</td> --}}
                          {{-- <td>{{$DataPegawai->email}}</td> --}}
                          <td>{{$DataPegawai->Sekolah->nama_sekolah}}</td>
                          {{-- <td>{{$DataPegawai->sidikjari_id}}</td> --}}
                          <td>
                            <button class="btn btn-labeled btn-info" type="button"
                            onclick="Info('{{Crypt::encryptString($DataPegawai->id)}}', '{{$DataPegawai->nama}}')">
                              <span class="btn-label"><i class="fa fa-info"></i>
                            </span><b>Info</b></button>
                            <button class="btn btn-labeled btn-primary" type="button"
                            onclick="Ubah('{{Crypt::encryptString($DataPegawai->id)}}', '{{$DataPegawai->nama}}')">
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
      text    : "Anda Akan di Arahkan ke Halaman Info Pegawai '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-pegawai/"+id+"/info";
  }

  function Ubah(id,Nama)
  {
    swal({
      title   : "Ubah",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Sekolah '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-pegawai/"+id+"/edit";
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
      icon    : "warning",
    })
  }
</script>
