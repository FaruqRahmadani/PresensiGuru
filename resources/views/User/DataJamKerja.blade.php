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
      <h3>
        @section('title')
          {{$Title = 'Data Jam Kerja'}}
        @endsection
        {{$Title}}
      </h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="well well-sm">
              <div class="panel-heading">
                <a href="/pengaturan-jam-kerja/tambah">
                  <button class="btn btn-labeled btn-info" type="button">
                    <span class="btn-label"><i class="fa fa-plus"></i>
                  </span><b>Tambah Data</b></button>
                </a>
              </div>
              <div class="panel-body no-padding">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover tabel-data-custom" id="datatable2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Hari</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th style="width:25%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      @foreach ($JamKerja as $DataJamKerja)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataJamKerja->hari}}</td>
                          <td>{{$DataJamKerja->jam_masuk}}</td>
                          <td>{{$DataJamKerja->jam_pulang}}</td>
                          <td>
                            <button class="btn btn-labeled btn-primary btn-xs" type="button"
                            onclick="Ubah('{{Crypt::encryptString($DataJamKerja->id)}}')">
                              <span class="btn-label"><i class="fa fa-pencil"></i>
                            </span><b>Edit</b></button>
                            {{-- <button class="btn btn-labeled btn-danger btn-xs" type="button"
                            onclick="{{$DataUser->id == Auth::user()->id ? 'cantHapus' : 'Hapus'}}('{{Crypt::encryptString($DataJamKerja->id)}}', '{{$DataJamKerja->nama}}')">
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
@section('bawahan')
  <script>
  function Ubah(id)
  {
    // swal({
    //   title   : "Ubah",
    //   text    : "Anda Akan di Arahkan ke Halaman Ubah Data Admin '"+Nama+"'",
    //   icon    : "info",
    // })
    window.location = "/pengaturan-jam-kerja/"+id+"/edit";
  }

  function Hapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Yakin Ingin Menghapus Data Admin '"+Nama+"' ?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Hapus",
      ],
    })
    .then((hapus) => {
      if (hapus) {
        // swal({
        //   title  : "Hapus",
        //   text   : "Data Admin '"+Nama+"' Akan di Hapus",
        //   icon   : "info",
        //   timer  : 2500,
        // });
        window.location = "/data-admin/"+id+"/hapus";
      } else {
        // swal({
        //   title  : "Batal Hapus",
        //   text   : "Data Admin '"+Nama+"' Batal di Hapus",
        //   icon   : "info",
        //   timer  : 2500,
        // })
      }
    });
  }

  function cantHapus(id,Nama)
  {
    swal({
      title   : "Hapus",
      text    : "Tidak Dapat Menghapus Data Sendiri",
      icon    : "error",
    })
  }
</script>
@endsection
