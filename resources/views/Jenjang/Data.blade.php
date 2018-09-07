@extends('User.Layouts.Master')
@section('content')
  <section>
    <div class="content-wrapper">
      <h3>Data Jenjang</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="well well-sm">
            <div class="panel-heading">
              <a href="{{Route('jenjangTambah')}}" class="btn btn-labeled btn-sm btn-info">
                <span class="btn-label"><i class="fa fa-plus"></i>
                </span><b>Tambah Data</b>
              </a>
            </div>
            <div class="panel-body no-padding">
              <div class="table-responsive">
                <table class="table table-hover tabel-data-custom" id="datatable2">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Jenjang</th>
                      <th>Jumlah Sekolah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Jenjang as $Index=>$DataJenjang)
                      <tr>
                        <td>{{$Index+1}}</td>
                        <td>{{$DataJenjang->nama_jenjang}}</td>
                        <td>{{$DataJenjang->Sekolah->count()}}</td>
                        <td>
                          <a href="{{Route('jenjangEdit', ['id' => $DataJenjang->UUID])}}" class="btn btn-labeled btn-primary btn-xs"><span class="btn-label"><i class="fa fa-pencil"></i></span><b>Edit</b></a>
                          <button-delete
                            url = {{Route('jenjangHapus', ['id' => $DataJenjang->UUID])}}
                            status = {{$DataJenjang->Sekolah->count()}}
                            pesan = 'Tidak Dapat Menghapus Data Berelasi'
                          ></button-delete>
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
