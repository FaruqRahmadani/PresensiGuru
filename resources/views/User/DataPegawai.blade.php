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
          {{$Title = 'Data Pegawai'}}
        @endsection
        {{$Title}}
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
                        <th>Sekolah Induk</th>
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
                          <td>
                            <img class="img-thumbnail img-circle" src="/Public-User/img/pegawai/{{$DataPegawai->foto}}" style="max-width : 25px; max-height : 25px;">
                            {{$DataPegawai->nama}}
                          </td>
                          {{-- <td>{{$DataPegawai->tempat_lahir}}, {{Carbon\Carbon::parse($DataPegawai->tanggal_lahir)->format('d-m-Y')}}</td> --}}
                          <td>{{$DataPegawai->jenis_kelamin == '1' ? 'Laki - Laki' : 'Perempuan'}}</td>
                          {{-- <td>{{$DataPegawai->no_handphone}}</td> --}}
                          {{-- <td>{{$DataPegawai->email}}</td> --}}
                          <td>{{$DataPegawai->Sekolah->nama_sekolah}}</td>
                          {{-- <td>{{$DataPegawai->sidikjari_id}}</td> --}}
                          <td>
                            <button class="btn btn-labeled btn-info" type="button" data-toggle="modal" data-target="#exampleModal"
                            onmouseover="idPegawai({{$DataPegawai->id}})">
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
  <script>
    function idPegawai(id)
    {
      $.get('/json/infopegawai/'+id+'/pegawai.json', function(pegawais)
      {
        $( "div" ).data( "data", pegawais );
        $( "tr > #nip" ).text( $( "div" ).data( "data" ).nip );
        $( "tr > #nuptk" ).text( $( "div" ).data( "data" ).nuptk );
        $( "tr > #nama" ).text( $( "div" ).data( "data" ).nama );
        $( "tr > #tempattanggallahir" ).text( $( "div" ).data( "data" ).tempat_lahir+', '+$( "div" ).data( "data" ).tanggal_lahir );
        $( "tr > #sekolahinduk" ).text( $( "div" ).data( "data" ).sekolah.nama_sekolah );
        $( "tr > #alamat" ).text( $( "div" ).data( "data" ).alamat );
        if ($( "div" ).data( "data" ).jenis_kelamin == 1) {
          $( "tr > #jeniskelamin" ).text( 'Laki - Laki' );
        }else{
          $( "tr > #jeniskelamin" ).text( 'Perempuan' );
        }
        $( "tr > #nomortelepon" ).text( $( "div" ).data( "data" ).no_handphone );
        $( "tr > #email" ).text( $( "div" ).data( "data" ).email );
        $( "tr > #nomortelepon" ).text( $( "div" ).data( "data" ).no_telepon );
        $( "tr > #email" ).text( $( "div" ).data( "data" ).email );
        $( "tr > #idsidikjari" ).text( $( "div" ).data( "data" ).sidikjari_id );
      });
    }
  </script>
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
              <td style="width:35%;">NIP</td>
              <td id="nip"></td>
           </tr>
           <tr>
              <td>NUPTK</td>
              <td id="nuptk"></td>
           </tr>
           <tr>
              <td>Nama</td>
              <td id="nama"></td>
           </tr>
           <tr>
              <td>Tempat, Tanggal Lahir</td>
              <td id="tempattanggallahir"></td>
           </tr>
           <tr>
              <td>Sekolah Induk</td>
              <td id="sekolahinduk"></td>
           </tr>
           <tr>
              <td>Alamat</td>
              <td id="alamat"></td>
           </tr>
           <tr>
              <td>Jenis Kelamin</td>
              <td id="jeniskelamin"></td>
           </tr>
           <tr>
              <td>No Telepon</td>
              <td id="nomortelepon"></td>
           </tr>
           <tr>
              <td>E-Mail</td>
              <td id="email"></td>
           </tr>
           <tr>
              <td>ID Sidik Jari</td>
              <td id="idsidikjari"></td>
           </tr>
         </tbody>
      </table>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
