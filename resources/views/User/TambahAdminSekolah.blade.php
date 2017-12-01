@extends('User.Layouts.Master')
@section('content')
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Tambah Data Admin Sekolah
      </h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/data-admin-sekolah">
              <button class="btn btn-labeled btn-primary" type="button">
                <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b></button>
            </a>
            <div class="panel-body">
              {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group">
                  <label class="col-lg-3 control-label">Nama</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Nama" value="{{old('Nama')}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">E-mail</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="email" name="Email" value="{{old('Email')}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Asal Sekolah</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-1" name="idSekolah" required>
                      <option value="" hidden> Pilih </option>
                      <option value="0" {{old('idSekolah') == '0' ? 'selected' : ''}}> Buat Data Sekolah Kosong </option>
                      @foreach ($Sekolah as $DataSekolah)
                        <option value="{{$DataSekolah->id}}" {{old('idSekolah') == $DataSekolah->id ? 'selected' : ''}}> {{$DataSekolah->nama_sekolah}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Foto
                    <br><small>Boleh di Kosongkan</small>
                  </label>
                  <div class="col-lg-8">
                    <input class="form-control" type="file" name="Foto" value="{{old('Foto')}}" accept="image/*">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Username</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Username" value="{{old('Username')}}" required pattern="[a-zA-Z0-9]+.{5,}" title="Minimal 6 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="password" name="Password" value="{{old('Password')}}" required pattern=".{5,}" title="Minimal 6 Karakter">
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
