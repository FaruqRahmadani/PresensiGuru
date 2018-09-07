@extends('User.Layouts.Master')
@section('content')
  <section>
    <div class="content-wrapper">
      <h3>Data Status Sekolah</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="well well-sm">
            <div class="panel-heading">
              <a href="{{Route('statusSekolahTambah')}}" class="btn btn-sm btn-labeled btn-info" type="button">
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
                    @foreach ($Status as $Index=>$DataStatus)
                      <tr>
                        <td>{{$Index+1}}</td>
                        <td>{{$DataStatus->nama_status}}</td>
                        <td>{{$DataStatus->Sekolah->count()}}</td>
                        <td>
                          <a href="{{Route('statusSekolahEdit', ['id' => $DataStatus->UUID])}}" class="btn btn-labeled btn-primary btn-xs">
                            <span class="btn-label"><i class="fa fa-pencil"></i>
                            </span><b>Edit</b>
                          </a>
                          <button-delete
                            url = {{Route('statusSekolahHapus', ['id' => $DataStatus->UUID])}}
                            status = {{$DataStatus->Sekolah->count()}}
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
