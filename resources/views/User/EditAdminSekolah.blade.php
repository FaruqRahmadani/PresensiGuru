@extends('User.Layouts.Master')
@section('content')
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Ubah Data Admin Sekolah
        <small>{{$User->nama}}</small>
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
                    <input class="form-control" type="text" name="Nama" value="{{$User->nama}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">E-mail</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="email" name="Email" value="{{$User->email}}" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Status User</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="Tipe" required>
                      <option value="2" {{$User->tipe == '2' ? 'selected' : ''}}>Aktif</option>
                      <option value="0" {{$User->tipe == '0' ? 'selected' : ''}}>Suspend</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Sekolah Induk</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-1" name="idSekolah" required>
                      @foreach ($Sekolah as $DataSekolah)
                        <option value="{{$DataSekolah->id}}" {{$User->sekolah_id == $DataSekolah->id ? 'selected' : ''}}> {{$DataSekolah->nama_sekolah}} </option>
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
                    <input class="form-control" type="text" name="Username" value="{{$User->username}}" required pattern="[a-zA-Z0-9]+.{4,}" title="Minimal 5 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="password" name="Password" value="{{old('Password')}}" placeholder="Isi Jika Ingin Ganti Password" pattern=".{4,}" title="Minimal 5 Karakter">
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
