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
      <h3>Data Jenjang</h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="panel well">
              <a href="/data-jenjang/tambah">
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
                        <th>Jenjang</th>
                        <th>Jumlah Sekolah</th>
                        <th style="width:25%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      @foreach ($Jenjang as $DataJenjang)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataJenjang->nama_jenjang}}</td>
                          <td>{{count($DataJenjang->Sekolah)}}</td>
                          <td>
                            <button class="btn btn-labeled btn-primary" type="button"
                            onclick="Ubah('{{Crypt::encryptString($DataJenjang->id)}}', '{{$DataJenjang->nama_jenjang}}')">
                              <span class="btn-label"><i class="fa fa-pencil"></i>
                            </span><b>Edit</b></button>
                            <button class="btn btn-labeled btn-danger" type="button" style=" {{$DataKelurahan->id == '0' ? 'display:none' : ''}} "
                            onclick="{{count($DataJenjang->Sekolah) == 0 ? 'Hapus' : 'cantHapus'}}('{{Crypt::encryptString($DataJenjang->id)}}', '{{$DataJenjang->nama_jenjang}}')">
                              <span class="btn-label"><i class="fa fa-close"></i>
                            </span><b>Hapus</b></button>
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
  function Ubah(id,Nama)
  {
    swal({
      title   : "Ubah",
      text    : "Anda Akan di Arahkan ke Halaman Ubah Data Jenjang '"+Nama+"'",
      icon    : "info",
    })
    window.location = "/data-jenjang/"+id+"/edit";
  }

  function Hapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Jenjang '"+Nama+"' ?",
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
          text   : "Data Jenjang '"+Nama+"' Akan di Hapus",
          icon   : "info",
          timer  : 2500,
        });
        window.location = "/data-jenjang/"+id+"/hapus";
      } else {
        swal({
          title  : "Batal Hapus",
          text   : "Data Jenjang '"+Nama+"' Batal di Hapus",
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
      text    : "Data Jenjang '"+Nama+"' Tidak dapat di Hapus Karena Ada Data Sekolah",
      icon    : "warning",
    })
  }
</script>