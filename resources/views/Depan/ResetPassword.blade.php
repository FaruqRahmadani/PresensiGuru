@extends('Depan.Layouts.Master')
@section('content')
  <div class="block-center mt-xl wd-xl">
    <div class="panel panel-dark panel-flat panel-lostpass">
      <div class="panel-heading text-center">
        <h4>LUPA PASSWORD</h4>
      </div>
      <div class="panel-body">
        <form class="mb-lg" role="form" method="POST" action="{{Route('lupaPasswordResetFormSubmit', ['Id' => $User->UUID, 'Token' => HCrypt::Encrypt($Token)])}}">
          {{ csrf_field() }}
          <div class="text-center">
            <label>
              {{$User->nama}}
            </label>
          </div>
          <div class="text-center">
            <label>
              {{$User->username}}
            </label>
          </div>
          <div class="form-group has-feedback">
            <input class="form-control" id="exampleInputEmail1" type="password" name="password" placeholder="Password Baru" autocomplete="off" required>
            <span class="fa fa-lock form-control-feedback text-muted"></span>
          </div>
          <button class="mb-sm btn btn-danger btn-block" type="submit">Reset Password</button>
        </form>
      </div>
      <hr style="margin :0px;">
      <div class="p-lg text-center">
        <span>&copy; 2018</span>
        <span>-</span>
        <span>Dinas Pendidikan</span>
        <br>
        <span><strong>Kab. Banjar</strong></span>
      </div>
    </div>
  </div>
@endsection
