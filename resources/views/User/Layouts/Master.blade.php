<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dinas Pendidikan Kabupaten Banjar</title>
  <link rel="icon" type="image/png" href="{{asset('images/logo/lg2.png')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="wrapper" id="app">
    <header class="topnavbar-wrapper">
      <nav class="navbar topnavbar" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" href="#/">
            <div class="brand-logo">
              <img class="img-responsive" src="{{asset('images/logo/lg1.png')}}" alt="App Logo">
            </div>
            <div class="brand-logo-collapsed">
              <img class="img-responsive" src="{{asset('images/logo/lg2.png')}}" alt="App Logo">
            </div>
          </a>
        </div>
        <div class="nav-wrapper">
          <ul class="nav navbar-nav">
            <li>
              <a class="hidden-xs" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                <em class="fa fa-navicon"></em>
              </a>
              <a class="visible-xs sidebar-toggle" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                <em class="fa fa-navicon"></em>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-list">
              <a href="#" data-toggle="dropdown" style="padding : 15px;">
                <div class="media-box">
                  <div class="pull-left">
                    <img class="img-circle thumb25 mr" src="{{asset('images/user/'.Auth::user()->foto)}}">
                    <strong class="media-box-heading text-default">
                      {{Auth::user()->nama}}
                    </strong>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu animated flipInX">
                <li>
                  <div class="list-group">
                    <a class="list-group-item" href="/edit-profil">
                      <div class="media-box">
                        <div class="pull-left">
                          <em class="fa fa-user text-info"></em>
                        </div>
                        <div class="media-box-body clearfix">
                          <p class="m0">Edit Profil</p>
                        </div>
                      </div>
                    </a>
                    <a class="list-group-item" onclick="logout()">
                      <div class="media-box">
                        <div class="pull-left">
                          <em class="fa fa-power-off text-danger"></em>
                        </div>
                        <div class="media-box-body clearfix">
                          <p class="m0">Logout</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="aside">
      <div class="aside-inner">
        <nav class="sidebar" data-sidebar-anyclick-close="">
          <ul class="nav">
            <li class="nav-heading">
              Menu Navigasi
            </li>
            <li class="has-user-block">
              <div class="collapse" id="user-block">
                <div class="item user-block">
                  <div class="user-block-picture">
                    <div class="user-block-status">
                      <img class="img-thumbnail img-circle" src="{{asset('images/user/'.Auth::user()->foto)}}" alt="Avatar" width="60" height="60">
                      <div class="circle circle-success circle-lg"></div>
                    </div>
                  </div>
                  <div class="user-block-info">
                    <span class="user-block-name">{{Auth::user()->nama}}</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="{{$Title == 'Dashboard' ? 'active' : ''}}">
              <a href="/home">
                <em class="icon-home"></em>
                <span>Dashboard</span>
              </a>
            </li>
            @if (Auth::user()->tipe == '1')
              <li class=" ">
                <a href="#MasterData" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="icon-layers"></em>
                  <span>Master Data</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="MasterData">
                  <li class="sidebar-subnav-header">Master Data</li>
                  <li class="{{$Title == 'Data Jenjang' ? 'active' : ''}}">
                    <a href="/data-jenjang">
                      <span>Jenjang</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Status Sekolah' ? 'active' : ''}}">
                    <a href="/data-status-sekolah">
                      <span>Status Sekolah</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Kategori Presensi' ? 'active' : ''}}">
                    <a href="/data-kategori-presensi">
                      <span>Kategori Presensi</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="#DataSekolah" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-university"></em>
                  <span>Data Sekolah</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="DataSekolah">
                  <li class="sidebar-subnav-header">Data Sekolah</li>
                  <li class="{{$Title == 'Data Sekolah' ? 'active' : ''}}">
                    <a href="/data-sekolah">
                      <span>Sekolah</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Admin Sekolah' ? 'active' : ''}}">
                    <a href="/data-admin-sekolah">
                      <span>Admin Sekolah</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Pegawai' ? 'active' : ''}}">
                    <a href="/data-pegawai">
                      <span>Pegawai</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="#DataPresensi" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-book"></em>
                  <span>Data Presensi</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="DataPresensi">
                  <li class="sidebar-subnav-header">Data Presensi</li>
                  <li class="{{$Title == 'Data Presensi' ? 'active' : ''}}">
                    <a href="/data-presensi">
                      <span>Data Presensi</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="/data-admin">
                  <em class="icon-user"></em>
                  <span>Data Admin</span>
                </a>
              </li>
            @endif
            @if (Auth::user()->tipe == '2')
              <li class=" ">
                <a href="#DataSekolahSaya" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-institution"></em>
                  <span>Data Sekolah</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="DataSekolahSaya">
                  <li class="sidebar-subnav-header">Data Sekolah</li>
                  <li class="{{$Title == 'Data Pegawai Sekolah' ? 'active' : ''}}">
                    <a href="/pegawai-sekolah">
                      <span>Pegawai</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Sekolah Saya' ? 'active' : ''}}">
                    <a href="/sekolah-saya">
                      <span>Sekolah</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="#DataPresensiSekolahSaya" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-book"></em>
                  <span>Data Presensi</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="DataPresensiSekolahSaya">
                  <li class="sidebar-subnav-header">Data Presensi</li>
                  <li class="{{$Title == 'Input Presensi Sekolah' ? 'active' : ''}}">
                    <a href="/input-presensi-sekolah">
                      <span>Input Presensi</span>
                    </a>
                  </li>
                  <li class="{{$Title == 'Data Presensi Sekolah' ? 'active' : ''}}">
                    <a href="/data-presensi-sekolah">
                      <span>Data Presensi</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="#Pengaturan" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-gear"></em>
                  <span>Pengaturan</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="Pengaturan">
                  <li class="sidebar-subnav-header">Pengaturan</li>
                  <li class="{{$Title == 'Data Jam Kerja' ? 'active' : ''}}">
                    <a href="/pengaturan-jam-kerja">
                      <span>Jam Kerja</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li class=" ">
                <a href="#Laporan" data-toggle="collapse">
                  <div class="pull-right mr"><em class="icon-arrow-down small"></em></div>
                  <em class="fa fa-gear"></em>
                  <span>Laporan</span>
                </a>
                <ul class="nav sidebar-subnav collapse" id="Laporan">
                  <li class="sidebar-subnav-header">Laporan</li>
                  <li class="{{$Title == 'Rekap Presensi' ? 'active' : ''}}">
                    <a href="/laporan-rekap-presensi">
                      <span>Rekap Presensi</span>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          </ul>
        </nav>
      </div>
    </aside>
    @yield('content')
    <footer>
      <span>&copy; 2018 - Dinas Pendidikan <strong>Kab. Banjar</strong></span>
    </footer>
  </div>
  @yield('bawahan')
  <script src="{{asset('js/app.js')}}"></script>
  @yield('jscustom')
</body>

</html>
