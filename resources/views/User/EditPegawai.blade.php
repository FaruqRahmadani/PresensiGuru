@extends('User.Layouts.Master')
@section('content')
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Edit Pegawai
      <small>{{$Pegawai->nama}}</small>
      </h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/pegawai-sekolah">
              <button class="btn btn-labeled btn-primary" type="button">
                <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b></button>
            </a>
            <div class="panel-body">
              {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group">
                  <label class="col-lg-3 control-label">NIP</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NIP" value="{{$Pegawai->nip}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">NUPTK</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NUPTK" value="{{$Pegawai->nuptk}}" pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Nama Pegawai</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NamaPegawai" value="{{$Pegawai->nama}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Asal Sekolah</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-1" name="idSekolah" required>
                      <option value="" hidden> Pilih </option>
                      @foreach ($Sekolah as $DataSekolah)
                        <option value="{{$DataSekolah->id}}" {{$Pegawai->sekolah_id == $DataSekolah->id ? 'selected' : ''}}> {{$DataSekolah->nama_sekolah}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Tempat Lahir</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="TempatLahir" value="{{$Pegawai->tempat_lahir}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Tanggal Lahir</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="date" name="TanggalLahir" value="{{Carbon\Carbon::parse($Pegawai->tanggal_lahir)->format('Y-m-d')}}" required max="{{Carbon\Carbon::now()->format('Y-m-d')}}" pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Jenis Kelamin</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="JenisKelamin" required>
                      <option value="" hidden>Pilih</option>
                      <option value="1" {{$Pegawai->jenis_kelamin == 1 ? 'selected' : ''}}>Laki - Laki</option>
                      <option value="2" {{$Pegawai->jenis_kelamin == 2 ? 'selected' : ''}}>Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Nomor Telepon</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NomorTelepon" value="{{$Pegawai->no_handphone}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">E-Mail</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Email" value="{{$Pegawai->email}}" required pattern=".{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Alamat</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Alamat" value="{{$Pegawai->alamat}}" required pattern=".{0,}" title="Minimal 1 Karakter">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">ID Absensi</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="idSidikJari" value="{{$Pegawai->sidikjari_id}}" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter">
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
