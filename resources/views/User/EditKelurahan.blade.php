@extends('User.Layouts.Master')
@section('content')
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Ubah Data Kelurahan
        <small>{{$Kelurahan->nama_kelurahan}}</small>
      </h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/data-kelurahan">
              <button class="btn btn-labeled btn-primary" type="button">
                <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b></button>
            </a>
            <div class="panel-body">
              {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group">
                  <label class="col-lg-3 control-label">Kecamatan</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-1" name="idKecamatan" required>
                      <option value="" hidden> Pilih </option>
                      @foreach ($Kecamatan as $DataKecamatan)
                        <option value="{{$DataKecamatan->id}}" {{$Kelurahan->kecamatan_id == $DataKecamatan->id ? 'selected' : ''}}> {{$DataKecamatan->nama_kecamatan}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Nama Kelurahan</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NamaKelurahan" value="{{$Kelurahan->nama_kelurahan}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label"></label>
                  <div class="row">
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-block btn-info btn">
                        <i class="fa fa-save"></i> <b>Simpan</b>
                      </button>
                    </div>
                    <div class="col-md-2">
                      <button type="reset" class="btn btn-block btn-danger btn">
                        <i class="fa fa-times"></i> <b>Reset</b>
                      </button>
                    </div>
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
