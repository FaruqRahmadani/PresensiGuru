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
          {{$Title = 'Data Sekolah'}}
        @endsection
        {{$Title}}
      </h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="well well-sm">
              <div class="panel-heading">
                <a href="/data-sekolah/tambah">
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
                        <th>NPSN</th>
                        <th>NSS</th>
                        <th>Nama Sekolah</th>
                        <th>Kepala Sekolah</th>
                        <th>Jenjang</th>
                        <th>Status</th>
                        <th>Kelurahan</th>
                        <th>kecamatan</th>
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
                          <td>{{$DataSekolah->pegawai_id != '0' ? $DataSekolah->Pegawai->nama : '-'}}</td>
                          <td>{{$DataSekolah->Jenjang->nama_jenjang}}</td>
                          <td>{{$DataSekolah->Status->nama_status}}</td>
                          <td>{{$DataSekolah->Kelurahan->nama_kelurahan}}</td>
                          <td>{{$DataSekolah->Kecamatan->nama_kecamatan}}</td>
                          <td>{{$DataSekolah->no_telepon}}</td>
                          <td>{{$DataSekolah->email}}</td>
                          <td>

                            <button class="btn btn-labeled btn-info btn-xs" type="button" data-toggle="modal" data-target="#exampleModal"
                            onmouseover="idSekolah({{$DataSekolah->id}})">
                              <span class="btn-label"><i class="fa fa-info"></i>
                            </span><b>Info</b></button>

                            {{-- <button class="btn btn-labeled btn-info" type="button"
                            onclick="Info('{{Crypt::encryptString($DataSekolah->id)}}', '{{$DataSekolah->nama_sekolah}}')">
                              <span class="btn-label"><i class="fa fa-info"></i>
                            </span><b>Info</b></button> --}}

                            <button class="btn btn-labeled btn-primary btn-xs" type="button"
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
  <script>
    function idSekolah(id)
    {
      $.get('/json/infosekolah/'+id+'/sekolah.json', function(sekolahs)
      {
        $( "div" ).data( "data", sekolahs );
        $( "tr > #npsn" ).text( $( "div" ).data( "data" ).npsn );
        $( "tr > #nss" ).text( $( "div" ).data( "data" ).nss );
        $( "tr > #nama_sekolah" ).text( $( "div" ).data( "data" ).nama_sekolah );
        if ($( "div" ).data( "data" ).pegawai_id == '0') {
          $( "tr > #kepalasekolah" ).text( '-' );
        }else{
          $( "tr > #kepalasekolah" ).text( $( "div" ).data( "data" ).pegawai.nama );
        }
        $( "tr > #jenjang" ).text( $( "div" ).data( "data" ).jenjang.nama_jenjang );
        $( "tr > #status" ).text( $( "div" ).data( "data" ).status.nama_status );
        $( "tr > #kecamatan" ).text( $( "div" ).data( "data" ).kecamatan.nama_kecamatan );
        $( "tr > #kelurahan" ).text( $( "div" ).data( "data" ).kelurahan.nama_kelurahan );
        $( "tr > #alamat" ).text( $( "div" ).data( "data" ).alamat );
        $( "tr > #nomortelepon" ).text( $( "div" ).data( "data" ).no_telepon );
        $( "tr > #email" ).text( $( "div" ).data( "data" ).email );
      });
    }
  </script>
@endsection
@section('bawahan')
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
    // swal({
    //   title   : "Ubah",
    //   text    : "Anda Akan di Arahkan ke Halaman Ubah Data Sekolah '"+Nama+"'",
    //   icon    : "info",
    // })
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
        // swal({
        //   title  : "Hapus",
        //   text   : "Data Status Sekolah '"+Nama+"' Akan di Hapus",
        //   icon   : "info",
        //   timer  : 2500,
        // });
        window.location = "/data-status-sekolah/"+id+"/hapus";
      } else {
        // swal({
        //   title  : "Batal Hapus",
        //   text   : "Data Status Sekolah '"+Nama+"' Batal di Hapus",
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
      text    : "Data Status Sekolah '"+Nama+"' Tidak dapat di Hapus Karena Ada Data Sekolah",
      icon    : "error",
    })
  }
</script>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div> --}}
      <div class="modal-body">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td>NPSN</td>
              <td id="npsn"></td>
            </tr>
            <tr>
              <td>NSS</td>
              <td id="nss"></td>
            </tr>
            <tr>
              <td>Nama Sekolah</td>
              <td id="nama_sekolah"></td>
            </tr>
            <tr>
              <td>Kepala Sekolah</td>
              <td id="kepalasekolah"></td>
            </tr>
            <tr>
              <td>Jenjang</td>
              <td id="jenjang"></td>
            </tr>
            <tr>
              <td>Status</td>
              <td id="status"></td>
            </tr>
            <tr>
              <td>Kecamatan</td>
              <td id="kecamatan"></td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td id="kelurahan"></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td id="alamat"></td>
            </tr>
            <tr>
              <td>Nomor Telepon</td>
              <td id="nomortelepon"></td>
            </tr>
            <tr>
              <td>E-Mail</td>
              <td id="email"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-labeled btn-warning" type="button" data-dismiss="modal">
          <span class="btn-label"><i class="fa fa-close"></i>
          </span><b>Keluar</b></button>
        </div>
      </div>
    </div>
  </div>
@endsection
