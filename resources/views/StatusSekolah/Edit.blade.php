@extends('User.Layouts.Master')
@section('content')
  <section>
    <div class="content-wrapper">
      <h3>
        @section('title')
          {{$Title = 'Ubah Data Status Sekolah'}}
        @endsection
        {{$Title}}
        <small>{{$Status->nama_status}}</small>
      </h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="{{Route('statusSekolahData')}}" class="btn btn-sm btn-labeled btn-primary" type="button">
              <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b>
            </a>
            <div class="panel-body">
              <form class="form-horizontal" action="{{Route('statusSekolahEdit', ['id' => $Status->UUID])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label class="col-lg-2 control-label">Nama Status Sekolah</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="nama_status" value="{{$Status->nama_status}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-labeled btn-info btn">
                      <span class="btn-label"><i class="fa fa-save"></i>
                      </span><b>Simpan</b>
                    </button>
                    <button type="reset" class="btn btn-labeled btn-danger btn">
                      <span class="btn-label"><i class="fa fa-times"></i>
                      </span><b>Reset</b>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
