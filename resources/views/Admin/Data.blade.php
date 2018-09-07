@extends('User.Layouts.Master')
@section('content')
  <section>
    <div class="content-wrapper">
      <h3>Data Admin</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="well well-sm">
            <div class="panel-heading">
              <a href="{{Route('adminTambah')}}">
                <button class="btn btn-labeled btn-info btn-sm" type="button">
                  <span class="btn-label"><i class="fa fa-plus"></i>
                  </span><b>Tambah Data</b></button>
                </a>
              </div>
              <div class="panel-body">
                <div class="table-responsive no-padding">
                  <table class="table table-hover tabel-data-custom" id="datatable2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Username</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($User as $Index=>$DataUser)
                        <tr>
                          <td>{{$Index+1}}</td>
                          <td><img class="img-thumbnail img-circle thumb30" src="{{asset("images/user/{$DataUser->foto}")}}"> {{$DataUser->nama}}</td>
                          <td>{{$DataUser->email}}</td>
                          <td>{{$DataUser->username}}</td>
                          <td>
                            <a href="{{Route('adminEdit', ['id' => $DataUser->UUID])}}" class="btn btn-labeled btn-primary btn-xs">
                              <span class="btn-label"><i class="fa fa-pencil"></i>
                              </span><b>Edit</b>
                            </a>
                            <button-delete
                            url = {{Route('adminHapus', ['id' => $DataUser->UUID])}}
                            status = {{$DataUser->id == Auth::User()->id ? 1 : 0}}
                            pesan = "Tidak Dapat Menghapus Data Sendiri"
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
