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
          {{$Title = 'Rekap Presensi'}}
        @endsection
        {{$Title}}
      </h3>
        <div class="row">
          <div class="col-lg-12">

            <div class="well well-sm">
              <div class="panel-heading">
                {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                  <div class="row">
                    <div class="col-lg-3">
                      <select class="form-control" id="select2-1" name="Periode" required>
                        @php
                          $DumpTanggal = '01012011';
                        @endphp
                        @foreach ($PeriodeAbsensi as $DataPeriodeAbsensi)
                          @if ($DumpTanggal != Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y'))
                            @php
                              $DumpTanggal = Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y');
                            @endphp
                            <option value="{{Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y')}}" {{$SelectedPeriode == Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y') ? 'selected' : ''}}>{{Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y')}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="col-lg-3">
                      <button type="submit" class="btn btn-labeled btn-info btn">
                        <span class="btn-label"><i class="fa fa-filter"></i>
                        </span><b>Filter</b>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover tabel-data-custom">
                    <thead>
                      <tr>
                        @php
                          $no = 0;
                        @endphp
                        <th style="width: 35px;">No</th>
                        <th style="width: 175px;">NIP</th>
                        <th>Nama Pegawai</th>
                        @foreach ($KategoriAbsen as $DataKategoriAbsen)
                          <th class="text-center" style="background-color:{{$DataKategoriAbsen->kode_warna}}; color:white; width: 40px;">{{$DataKategoriAbsen->kode}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Pegawai as $DataPegawai)
                        <tr>
                          <td>{{$no+=1}}</td>
                          <td>{{$DataPegawai->nip}}</td>
                          <td>{{$DataPegawai->nama}}</td>
                          @foreach ($KategoriAbsen as $DataKategoriAbsen)
                            <th class="text-center">{{count($Absensi->where('pegawai_id', $DataPegawai->id)->where('kategori_absen_id', $DataKategoriAbsen->id)->get())}}</th>
                          @endforeach
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="panel pull-right">
                  <a href="/laporan-rekap-presensi/{{Crypt::encryptString(Carbon\Carbon::parse($DataPeriodeAbsensi->tanggal)->format('F Y'))}}/cetak" target="_blank">
                    <button class="btn btn-labeled btn-primary" type="button">
                      <span class="btn-label"><i class="fa fa-print"></i>
                    </span><b>Cetak</b></button>
                  </a>
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
  function Info(idSekolah,tanggal)
  {
    window.location = "/data-presensi-sekolah/"+idSekolah+"/"+tanggal;
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
