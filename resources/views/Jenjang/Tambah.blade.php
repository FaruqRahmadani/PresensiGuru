@extends('User.Layouts.Master')
@section('content')
  <section>
    <div class="content-wrapper">
      <h3>Tambah Data Jenjang</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/data-jenjang" class="btn btn-sm btn-labeled btn-primary">
              <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b>
            </a>
            <div class="panel-body">
              <form class="form-horizontal" action="{{Route('jenjangTambahSubmit')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label class="col-lg-2 control-label">Nama Jenjang</label>
                  <div class="col-lg-10">
                    <input class="form-control" type="text" name="nama_jenjang" value="{{old('nama_jenjang')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-labeled btn-info">
                      <span class="btn-label"><i class="fa fa-save"></i>
                      </span><b>Simpan</b>
                    </button>
                    <button type="reset" class="btn btn-labeled btn-danger">
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
