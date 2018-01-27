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
          {{$Title = 'Input Presensi Sekolah'}}
        @endsection
        {{$Title}}
      </h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="well well-sm">
              <div class="panel-body">
                <div class="table-responsive no-padding">
                  <table class="table table-striped table-bordered table-hover tabel-data-custom">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Absensi</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 0;
                      @endphp
                      {!! Form::open(['url'=>Request::url().'/submit','files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        @foreach ($Presensi as $DataPresensi)
                          <tr>
                            <td>{{$no+=1}}</td>
                            <td>{{$DataPresensi->nama}}</td>
                            <td>{{$DataPresensi->jammasuk != null ? Carbon\Carbon::parse($DataPresensi->jammasuk)->format('d-m-Y') : '-'}}</td>
                            <input class="form-control" type="text" name="Post[{{$no}}][idSidikJari]" value="{{$DataPresensi->sidikjari_id}}" style="display:none;">
                            <input class="form-control" type="date" name="Post[{{$no}}][tanggal]" value="{{Carbon\Carbon::parse($DataPresensi->jammasuk)->format('Y-m-d')}}" style="display:none">
                            <td>{{$DataPresensi->jammasuk != null ? Carbon\Carbon::parse($DataPresensi->jammasuk)->format('h:i:s A') : '-'}}</td>
                            <input class="form-control" type="text" name="Post[{{$no}}][JamMasuk]" value="{{$DataPresensi->jammasuk != null ? Carbon\Carbon::parse($DataPresensi->jammasuk)->format('H:i:s') : ''}}" style="display:none">
                            <td>{{$DataPresensi->jamkeluar != null ? Carbon\Carbon::parse($DataPresensi->jamkeluar)->format('h:i:s A') : '-'}}</td>
                            <input class="form-control" type="text" name="Post[{{$no}}][JamKeluar]" value="{{$DataPresensi->jamkeluar != null ? Carbon\Carbon::parse($DataPresensi->jamkeluar)->format('H:i:s') : ''}}" style="display:none">
                            <td>
                              <select class="form-control" name="Post[{{$no}}][Absensi]" style="width:100% !important" required>
                                <option value="" hidden>Pilih</option>
                                @foreach ($KategoriAbsen as $DataKategoriAbsen)
                                  <option value="{{$DataKategoriAbsen->id}}"> {{$DataKategoriAbsen->keterangan}} </option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <input class="form-control" type="text" name="Post[{{$no}}][Keterangan]" value="{{old('Keterangan[]')}}">
                            </td>
                          </tr>
                        @endforeach
                        <div class="panel-heading" style="padding-left : 0px">
                          <button type="submit" class="btn btn-labeled btn-info btn">
                            <span class="btn-label"><i class="fa fa-save"></i>
                            </span><b>Simpan</b>
                          </button>
                        </div>
                      </form>
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
  function Ubah(id,Nama)
  {
    // swal({
    //   title   : "Ubah",
    //   text    : "Anda Akan di Arahkan ke Halaman Ubah Data Admin '"+Nama+"'",
    //   icon    : "info",
    // })
    window.location = "/data-admin/"+id+"/edit";
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
