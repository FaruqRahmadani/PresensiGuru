@extends('User.Layouts.Master')
@section('content')
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <h3>
              @section('title')
                {{$Title = 'Dashboard'}}
              @endsection
              {{$Title}}
            </h3>
            <div class="row">
               <div class="col-lg-12">
                  <p>A row with content</p>
               </div>
            </div>
         </div>
      </section>
@endsection
