@extends('Depan.Layouts.Master')
@section('content')
  <div class="block-center mt-xl wd-xl">
    <div class="panel panel-dark panel-flat panel-lostpass">
      <div class="panel-heading text-center">
        <h4>LUPA PASSWORD</h4>
      </div>
      <div class="panel-body">
        <form class="mb-lg" role="form" method="POST" action="{{Route('lupaPasswordFormSubmit')}}">
          {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off" required>
            <span class="fa fa-envelope form-control-feedback text-muted"></span>
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
  <script>
  @if (session('warning'))
  swal({
    title   : "Warning",
    text    : "{{session('warning')}}",
    icon    : "warning",
  })
  @endif
  </script>
@endsection
