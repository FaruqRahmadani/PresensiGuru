@extends('User.Layouts.Master')
@section('content')
  <section>
    <!-- Page content-->
    <div class="content-wrapper">
      <h3>Tambah Data Sekolah
      </h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/data-sekolah">
              <button class="btn btn-labeled btn-primary" type="button">
                <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b></button>
            </a>
            <div class="panel-body">
              {!! Form::open(['url'=>Request::url(),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group">
                  <label class="col-lg-3 control-label">NPSN</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NPSN" value="{{old('NPSN')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">NSS</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NSS" value="{{old('NSS')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Nama Sekolah</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NamaSekolah" value="{{old('NamaSekolah')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Jenjang</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="idJenjang" required>
                      <option value="" hidden>Pilih</option>
                      @foreach ($Jenjang as $DataJenjang)
                        <option value="{{$DataJenjang->id}}">{{$DataJenjang->nama_jenjang}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Status Sekolah</label>
                  <div class="col-lg-8">
                    <select class="form-control" name="idStatus" required>
                      <option value="" hidden>Pilih</option>
                      @foreach ($Status as $DataStatus)
                        <option value="{{$DataStatus->id}}">{{$DataStatus->nama_status}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Kecamatan</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-1" name="idKecamatan" required>
                      <option value="" hidden>Pilih</option>
                      @foreach ($Kecamatan as $DataKecamatan)
                        <option value="{{$DataKecamatan->id}}"> {{$DataKecamatan->nama_kecamatan}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Kelurahan</label>
                  <div class="col-lg-8">
                    <select class="form-control" id="select2-2" name="idKelurahan" required>
                      <option value="" hidden>Pilih Kecamatan Terlebih Dahulu</option>
                      {{-- @foreach ($Kelurahan as $DataKelurahan)
                        <option value="{{$DataKelurahan->id}}"> {{$DataKelurahan->nama_kelurahan}} </option>
                      @endforeach --}}
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Alamat</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="Alamat" value="{{old('Alamat')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Nomor Telepon</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="text" name="NomorTelepon" value="{{old('NomorTelepon')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">E-Mail</label>
                  <div class="col-lg-8">
                    <input class="form-control" type="email" name="Email" value="{{old('Email')}}" required pattern=".{0,}" title="Minimal 1 Karakter" autofocus>
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
  <script>
    $(document).ready(function() {
      $('#select2-1').change(function()
      {
        $.get('/json/kecamatan/'+this.value+'/kelurahan.json', function(kelurahans)
        {
          var $kelurahan = $('#select2-2');
          $kelurahan.find('option').remove().end();
          $kelurahan.append('<option value="" hidden>Pilih</option>');

          $.each(kelurahans, function(index, kelurahan) {
            $kelurahan.append('<option value="' + kelurahan.id + '">' + kelurahan.nama_kelurahan + '</option>');
          });
        });
      });
    });
  </script>
@endsection
