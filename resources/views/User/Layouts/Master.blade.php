
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Presensi Guru</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="/Public-User/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="/Public-User/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="/Public-User/vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="/Public-User/vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- CHOSEN-->
   <link rel="stylesheet" href="/Public-User/vendor/chosen_v1.2.0/chosen.min.css">
   <!-- SELECT2-->
   <link rel="stylesheet" href="/Public-User/vendor/select2/dist/css/select2.css">
   <link rel="stylesheet" href="/Public-User/vendor/select2-bootstrap-theme/dist/select2-bootstrap.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="/Public-User/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="/Public-User/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav class="navbar topnavbar" role="navigation">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a class="navbar-brand" href="#/">
                  <div class="brand-logo">
                     <img class="img-responsive" src="/Public-User/img/logo.png" alt="App Logo">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img class="img-responsive" src="/Public-User/img/logo-single.png" alt="App Logo">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a class="hidden-xs" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a class="visible-xs sidebar-toggle" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  <!-- START User avatar toggle-->
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <!-- END User avatar toggle-->
                  <!-- START lock screen-->
                  <li>
                     <a href="lock.html" title="Lock screen">
                        <em class="icon-lock"></em>
                     </a>
                  </li>
                  <!-- END lock screen-->
               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Search icon-->
                  <li>
                     <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                     </a>
                  </li>
                  <!-- Fullscreen (only desktops)-->
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                     </a>
                  </li>
                  <!-- START Alert menu-->
                  <li class="dropdown dropdown-list">
                     <a href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                        <div class="label label-danger">11</div>
                     </a>
                     <!-- START Dropdown menu-->
                     <ul class="dropdown-menu animated flipInX">
                        <li>
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- list item-->
                              <a class="list-group-item" href="#">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-twitter fa-2x text-info"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New followers</p>
                                       <p class="m0 text-muted">
                                          <small>1 new follower</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                              <a class="list-group-item" href="#">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-envelope fa-2x text-warning"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New e-mails</p>
                                       <p class="m0 text-muted">
                                          <small>You have 10 new emails</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                              <a class="list-group-item" href="#">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-tasks fa-2x text-success"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">Pending Tasks</p>
                                       <p class="m0 text-muted">
                                          <small>11 pending task</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- last list item-->
                              <a class="list-group-item" href="#">
                                 <small>More notifications</small>
                                 <span class="label label-danger pull-right">14</span>
                              </a>
                           </div>
                           <!-- END list group-->
                        </li>
                     </ul>
                     <!-- END Dropdown menu-->
                  </li>
                  <!-- END Alert menu-->
                  <!-- START Offsidebar button-->
                  <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>
                  <!-- END Offsidebar menu-->

                  {{-- LOGOUT --}}
                  <li>
                     <a href="#" onclick="logout()">
                        <em class="fa fa-power-off"></em>
                     </a>
                  </li>
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
            <!-- START Search form-->
            <form class="navbar-form" role="search" action="search.html">
               <div class="form-group has-feedback">
                  <input class="form-control" type="text" placeholder="Type and hit enter /Public-User.">
                  <div class="fa fa-times form-control-feedback" data-search-dismiss=""></div>
               </div>
               <button class="hidden btn btn-default" type="submit">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         <!-- END Top Navbar-->
      </header>
      <!-- sidebar-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
               <!-- START sidebar nav-->
               <ul class="nav">
                  <!-- START user info-->
                  <li class="has-user-block">
                     <div class="collapse" id="user-block">
                        <div class="item user-block">
                           <!-- User picture-->
                           <div class="user-block-picture">
                              <div class="user-block-status">
                                 <img class="img-thumbnail img-circle" src="/Public-User/img/user/{{Auth::user()->foto}}" alt="Avatar" width="60" height="60">
                                 <div class="circle circle-success circle-lg"></div>
                              </div>
                           </div>
                           <!-- Name and Job-->
                           <div class="user-block-info">
                              <span class="user-block-name">{{Auth::user()->nama}}</span>
                           </div>
                        </div>
                     </div>
                  </li>
                  <!-- END user info-->
                  <!-- Iterates over all sidebar items-->
                  <li class="active">
                     <a href="/home">
                        <em class="icon-home"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Dashboard</span>
                     </a>
                  </li>

                  <li class=" ">
                     <a href="#MasterData" data-toggle="collapse">
                        <div class="pull-right label label-primary"><em class="icon-arrow-down"></em></div>
                        <em class="icon-layers"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Master Data</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="MasterData">
                        <li class="sidebar-subnav-header">Master Data</li>
                        <li class=" ">
                           <a href="/data-kecamatan">
                              <em class="icon-map"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Kecamatan</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/data-kelurahan">
                              <em class="icon-map"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Kelurahan</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/data-jenjang">
                              <em class="icon-menu"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Jenjang</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/data-status-sekolah">
                              <em class="icon-drawer"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Status Sekolah</span>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class=" ">
                     <a href="#DataSekolah" data-toggle="collapse">
                        <div class="pull-right label label-primary"><em class="icon-arrow-down"></em></div>
                        <em class="fa fa-university"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Data Sekolah</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="DataSekolah">
                        <li class="sidebar-subnav-header">Data Sekolah</li>
                        <li class=" ">
                           <a href="/data-admin-sekolah">
                              <em class="icon-user"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Admin Sekolah</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/data-sekolah">
                              <em class="icon-graduation"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Sekolah</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/data-pegawai">
                              <em class="icon-people"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Pegawai</span>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class=" ">
                     <a href="#DataSekolahSaya" data-toggle="collapse">
                        <div class="pull-right label label-primary"><em class="icon-arrow-down"></em></div>
                        <em class="fa fa-institution"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Data Sekolah Saya</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="DataSekolahSaya">
                        <li class="sidebar-subnav-header">Data Sekolah Saya</li>
                        <li class=" ">
                           <a href="/pegawai-sekolah">
                              <em class="icon-people"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Pegawai</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="/sekolah-saya">
                              <em class="icon-graduation"></em>
                              <span data-localize="sidebar.nav.DOCUMENTATION">Sekolah</span>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">Master Menu</span>
                  </li>
                  <li class=" ">
                     <a href="/data-admin">
                        <em class="icon-user"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Data Admin</span>
                     </a>
                  </li>


                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                  </li>
                  <li class=" ">
                     <a href="#dashboard" title="Dashboard" data-toggle="collapse">
                        <div class="pull-right label label-info">3</div>
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="dashboard">
                        <li class="sidebar-subnav-header">Dashboard</li>
                        <li class=" ">
                           <a href="dashboard.html" title="Dashboard v1">
                              <span>Dashboard v1</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="dashboard_v2.html" title="Dashboard v2">
                              <span>Dashboard v2</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="dashboard_v3.html" title="Dashboard v3">
                              <span>Dashboard v3</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="widgets.html" title="Widgets">
                        <div class="pull-right label label-success">30</div>
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.WIDGETS">Widgets</span>
                     </a>
                  </li>
                  <li class=" ">
                     <a href="#layout" title="Layouts" data-toggle="collapse">
                        <em class="icon-layers"></em>
                        <span>Layouts</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="layout">
                        <li class="sidebar-subnav-header">Layouts</li>
                        <li class=" ">
                           <a href="dashboard_h.html" title="Horizontal">
                              <span>Horizontal</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">Components</span>
                  </li>
                  <li class=" ">
                     <a href="#elements" title="Elements" data-toggle="collapse">
                        <em class="icon-chemistry"></em>
                        <span data-localize="sidebar.nav.element.ELEMENTS">Elements</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="elements">
                        <li class="sidebar-subnav-header">Elements</li>
                        <li class=" ">
                           <a href="buttons.html" title="Buttons">
                              <span data-localize="sidebar.nav.element.BUTTON">Buttons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="notifications.html" title="Notifications">
                              <span data-localize="sidebar.nav.element.NOTIFICATION">Notifications</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="sweetalert.html" title="Sweet Alert">
                              <span>Sweet Alert</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="tour.html" title="Tour">
                              <span>Tour</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="carousel.html" title="Carousel">
                              <span data-localize="sidebar.nav.element.INTERACTION">Carousel</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="spinners.html" title="Spinners">
                              <span data-localize="sidebar.nav.element.SPINNER">Spinners</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="animations.html" title="Animations">
                              <span data-localize="sidebar.nav.element.ANIMATION">Animations</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="dropdown-animations.html" title="Dropdown">
                              <span data-localize="sidebar.nav.element.DROPDOWN">Dropdown</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="nestable.html" title="Nestable">
                              <span>Nestable</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="sortable.html" title="Sortable">
                              <span>Sortable</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="panels.html" title="Panels">
                              <span data-localize="sidebar.nav.element.PANEL">Panels</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="portlets.html" title="Portlets">
                              <span data-localize="sidebar.nav.element.PORTLET">Portlets</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="grid.html" title="Grid">
                              <span data-localize="sidebar.nav.element.GRID">Grid</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="grid-masonry.html" title="Grid Masonry">
                              <span data-localize="sidebar.nav.element.GRID_MASONRY">Grid Masonry</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="typo.html" title="Typography">
                              <span data-localize="sidebar.nav.element.TYPO">Typography</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="icons-font.html" title="Font Icons">
                              <div class="pull-right label label-success">+400</div>
                              <span data-localize="sidebar.nav.element.FONT_ICON">Font Icons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="icons-weather.html" title="Weather Icons">
                              <div class="pull-right label label-success">+100</div>
                              <span data-localize="sidebar.nav.element.WEATHER_ICON">Weather Icons</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="colors.html" title="Colors">
                              <span data-localize="sidebar.nav.element.COLOR">Colors</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#forms" title="Forms" data-toggle="collapse">
                        <em class="icon-note"></em>
                        <span data-localize="sidebar.nav.form.FORM">Forms</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="forms">
                        <li class="sidebar-subnav-header">Forms</li>
                        <li class=" ">
                           <a href="form-standard.html" title="Standard">
                              <span data-localize="sidebar.nav.form.STANDARD">Standard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-extended.html" title="Extended">
                              <span data-localize="sidebar.nav.form.EXTENDED">Extended</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-validation.html" title="Validation">
                              <span data-localize="sidebar.nav.form.VALIDATION">Validation</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-wizard.html" title="Wizard">
                              <span>Wizard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-upload.html" title="Upload">
                              <span>Upload</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-xeditable.html" title="xEditable">
                              <span>xEditable</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="form-imagecrop.html" title="Cropper">
                              <span>Cropper</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#charts" title="Charts" data-toggle="collapse">
                        <em class="icon-graph"></em>
                        <span data-localize="sidebar.nav.chart.CHART">Charts</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="charts">
                        <li class="sidebar-subnav-header">Charts</li>
                        <li class=" ">
                           <a href="chart-flot.html" title="Flot">
                              <span data-localize="sidebar.nav.chart.FLOT">Flot</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-radial.html" title="Radial">
                              <span data-localize="sidebar.nav.chart.RADIAL">Radial</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-js.html" title="Chart JS">
                              <span>Chart JS</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-rickshaw.html" title="Rickshaw">
                              <span>Rickshaw</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-morris.html" title="MorrisJS">
                              <span>MorrisJS</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="chart-chartist.html" title="Chartist">
                              <span>Chartist</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#tables" title="Tables" data-toggle="collapse">
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.table.TABLE">Tables</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="tables">
                        <li class="sidebar-subnav-header">Tables</li>
                        <li class=" ">
                           <a href="table-standard.html" title="Standard">
                              <span data-localize="sidebar.nav.table.STANDARD">Standard</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-extended.html" title="Extended">
                              <span data-localize="sidebar.nav.table.EXTENDED">Extended</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-datatable.html" title="DataTables">
                              <span data-localize="sidebar.nav.table.DATATABLE">DataTables</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="table-jqgrid.html" title="jqGrid">
                              <span>jqGrid</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#maps" title="Maps" data-toggle="collapse">
                        <em class="icon-map"></em>
                        <span data-localize="sidebar.nav.map.MAP">Maps</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="maps">
                        <li class="sidebar-subnav-header">Maps</li>
                        <li class=" ">
                           <a href="maps-google.html" title="Google Maps">
                              <span data-localize="sidebar.nav.map.GOOGLE">Google Maps</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="maps-vector.html" title="Vector Maps">
                              <span data-localize="sidebar.nav.map.VECTOR">Vector Maps</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.MORE">More</span>
                  </li>
                  <li class=" ">
                     <a href="#pages" title="Pages" data-toggle="collapse">
                        <em class="icon-doc"></em>
                        <span data-localize="sidebar.nav.pages.PAGES">Pages</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="pages">
                        <li class="sidebar-subnav-header">Pages</li>
                        <li class=" ">
                           <a href="login.html" title="Login">
                              <span data-localize="sidebar.nav.pages.LOGIN">Login</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="register.html" title="Sign up">
                              <span data-localize="sidebar.nav.pages.REGISTER">Sign up</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="recover.html" title="Recover Password">
                              <span data-localize="sidebar.nav.pages.RECOVER">Recover Password</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="lock.html" title="Lock">
                              <span data-localize="sidebar.nav.pages.LOCK">Lock</span>
                           </a>
                        </li>
                        <li class=" active">
                           <a href="template.html" title="Starter Template">
                              <span data-localize="sidebar.nav.pages.STARTER">Starter Template</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="404.html" title="404">
                              <span>404</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="500.html" title="500">
                              <span>500</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="maintenance.html" title="Maintenance">
                              <span>Maintenance</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#extras" title="Extras" data-toggle="collapse">
                        <em class="icon-cup"></em>
                        <span data-localize="sidebar.nav.extra.EXTRA">Extras</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="extras">
                        <li class="sidebar-subnav-header">Extras</li>
                        <li class=" ">
                           <a href="#blog" title="Blog" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <span>Blog</span>
                           </a>
                           <ul class="nav sidebar-subnav collapse" id="blog">
                              <li class="sidebar-subnav-header">Blog</li>
                              <li class=" ">
                                 <a href="blog.html" title="List">
                                    <span>List</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-post.html" title="Post">
                                    <span>Post</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-articles.html" title="Articles">
                                    <span>Articles</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="blog-article-view.html" title="Article View">
                                    <span>Article View</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="#ecommerce" title="eCommerce" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <span>eCommerce</span>
                           </a>
                           <ul class="nav sidebar-subnav collapse" id="ecommerce">
                              <li class="sidebar-subnav-header">eCommerce</li>
                              <li class=" ">
                                 <a href="ecommerce-orders.html" title="Orders">
                                    <div class="pull-right label label-info">10</div>
                                    <span>Orders</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-order-view.html" title="Order View">
                                    <span>Order View</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-products.html" title="Products">
                                    <span>Products</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-product-view.html" title="Product View">
                                    <span>Product View</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="ecommerce-checkout.html" title="Checkout">
                                    <span>Checkout</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="#forum" title="Forum" data-toggle="collapse">
                              <em class="fa fa-angle-right"></em>
                              <span>Forum</span>
                           </a>
                           <ul class="nav sidebar-subnav collapse" id="forum">
                              <li class="sidebar-subnav-header">Forum</li>
                              <li class=" ">
                                 <a href="forum-categories.html" title="Categories">
                                    <span>Categories</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="forum-topics.html" title="Topics">
                                    <span>Topics</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="forum-discussion.html" title="Discussion">
                                    <span>Discussion</span>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class=" ">
                           <a href="contacts.html" title="Contacts">
                              <span>Contacts</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="contact-details.html" title="Contact details">
                              <span>Contact details</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="projects.html" title="Projects">
                              <span>Projects</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="project-details.html" title="Projects details">
                              <span>Projects details</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="team-viewer.html" title="Team viewer">
                              <span>Team viewer</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="social-board.html" title="Social board">
                              <span>Social board</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="vote-links.html" title="Vote links">
                              <span>Vote links</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="bug-tracker.html" title="Bug tracker">
                              <span>Bug tracker</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="faq.html" title="FAQ">
                              <span>FAQ</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="help-center.html" title="Help Center">
                              <span>Help Center</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="followers.html" title="Followers">
                              <span>Followers</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="settings.html" title="Settings">
                              <span>Settings</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="plans.html" title="Plans">
                              <span>Plans</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="file-manager.html" title="File manager">
                              <span>File manager</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="mailbox.html" title="Mailbox">
                              <span data-localize="sidebar.nav.extra.MAILBOX">Mailbox</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="timeline.html" title="Timeline">
                              <span data-localize="sidebar.nav.extra.TIMELINE">Timeline</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="calendar.html" title="Calendar">
                              <span data-localize="sidebar.nav.extra.CALENDAR">Calendar</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="invoice.html" title="Invoice">
                              <span data-localize="sidebar.nav.extra.INVOICE">Invoice</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="search.html" title="Search">
                              <span data-localize="sidebar.nav.extra.SEARCH">Search</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="todo.html" title="Todo List">
                              <span data-localize="sidebar.nav.extra.TODO">Todo List</span>
                           </a>
                        </li>
                        <li class=" ">
                           <a href="profile.html" title="Profile">
                              <span data-localize="sidebar.nav.extra.PROFILE">Profile</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="#multilevel" title="Multilevel" data-toggle="collapse">
                        <em class="fa fa-folder-open-o"></em>
                        <span>Multilevel</span>
                     </a>
                     <ul class="nav sidebar-subnav collapse" id="multilevel">
                        <li class="sidebar-subnav-header">Multilevel</li>
                        <li class=" ">
                           <a href="#level1" title="Level 1" data-toggle="collapse">
                              <span>Level 1</span>
                           </a>
                           <ul class="nav sidebar-subnav collapse" id="level1">
                              <li class="sidebar-subnav-header">Level 1</li>
                              <li class=" ">
                                 <a href="multilevel-1.html" title="Level1 Item">
                                    <span>Level1 Item</span>
                                 </a>
                              </li>
                              <li class=" ">
                                 <a href="#level2" title="Level 2" data-toggle="collapse">
                                    <span>Level 2</span>
                                 </a>
                                 <ul class="nav sidebar-subnav collapse" id="level2">
                                    <li class="sidebar-subnav-header">Level 2</li>
                                    <li class=" ">
                                       <a href="#level3" title="Level 3" data-toggle="collapse">
                                          <span>Level 3</span>
                                       </a>
                                       <ul class="nav sidebar-subnav collapse" id="level3">
                                          <li class="sidebar-subnav-header">Level 3</li>
                                          <li class=" ">
                                             <a href="multilevel-3.html" title="Level3 Item">
                                                <span>Level3 Item</span>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="documentation.html" title="Documentation">
                        <em class="icon-graduation"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">Documentation</span>
                     </a>
                  </li>
               </ul>
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- offsidebar-->
      <aside class="offsidebar hide">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li class="active" role="presentation">
                     <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                        <em class="icon-equalizer fa-lg"></em>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                        <em class="icon-user fa-lg"></em>
                     </a>
                  </li>
               </ul>
               <!-- Tab panes-->
               <div class="tab-content">
                  <div class="tab-pane fade in active" id="app-settings" role="tabpanel">
                     <h3 class="text-center text-thin">Settings</h3>
                     <div class="p">
                        <h4 class="text-muted text-thin">Themes</h4>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-a.css">
                                    <input type="radio" name="setting-theme" checked="checked">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info"></span>
                                       <span class="color bg-info-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-b.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green"></span>
                                       <span class="color bg-green-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-c.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple"></span>
                                       <span class="color bg-purple-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-d.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger"></span>
                                       <span class="color bg-danger-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-e.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info-dark"></span>
                                       <span class="color bg-info"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-f.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green-dark"></span>
                                       <span class="color bg-green"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-g.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple-dark"></span>
                                       <span class="color bg-purple"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="css/theme-h.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger-dark"></span>
                                       <span class="color bg-danger"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Layout</h4>
                        <div class="clearfix">
                           <p class="pull-left">Fixed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Boxed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">RTL</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-rtl" type="checkbox">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Aside</h4>
                        <div class="clearfix">
                           <p class="pull-left">Collapsed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Collapsed Text</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Float</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-float" type="checkbox" data-toggle-state="aside-float">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Hover</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Show Scrollbar</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-hover" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="app-chat" role="tabpanel">
                     <h3 class="text-center text-thin">Connections</h3>
                     <ul class="nav">
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">ONLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/05.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Juan Sims</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/06.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Maureen Jenkins</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-danger circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/07.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Billie Dunn</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-warning circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/08.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tomothy Roberts</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">OFFLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/09.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Lawrence Robinson</strong>
                                    <br>
                                    <small class="text-muted">Developer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a class="media-box p mt0" href="#">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img class="media-box-object img-circle thumb48" src="img/user/10.jpg" alt="Image">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tyrone Owens</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <li>
                           <div class="p-lg text-center">
                              <!-- Optional link to list more users-->
                              <a class="btn btn-purple btn-sm" href="#" title="See more contacts">
                                 <strong>Load more/Public-User</strong>
                              </a>
                           </div>
                        </li>
                     </ul>
                     <!-- Extra items-->
                     <div class="p">
                        <p>
                           <small class="text-muted">Tasks completion</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div class="progress-bar progress-bar-success progress-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <p>
                           <small class="text-muted">Upload quota</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div class="progress-bar progress-bar-warning progress-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>

@yield('content')

<!-- Page footer-->
<footer>
   <span>&copy; 2017 - Angle</span>
</footer>
</div>
<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="/Public-User/vendor/modernizr/modernizr.custom.js"></script>
<!-- MATCHMEDIA POLYFILL-->
<script src="/Public-User/vendor/matchMedia/matchMedia.js"></script>
<!-- JQUERY-->
<script src="/Public-User/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/Public-User/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/Public-User/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
<!-- JQUERY EASING-->
<script src="/Public-User/vendor/jquery.easing/js/jquery.easing.js"></script>
<!-- ANIMO-->
<script src="/Public-User/vendor/animo.js/animo.js"></script>
<!-- SLIMSCROLL-->
<script src="/Public-User/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<!-- SCREENFULL-->
<script src="/Public-User/vendor/screenfull/dist/screenfull.js"></script>
<!-- LOCALIZE-->
<script src="/Public-User/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
<!-- RTL demo-->
<script src="/Public-User/js/demo/demo-rtl.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- CHOSEN-->
<script src="/Public-User/vendor/chosen_v1.2.0/chosen.jquery.min.js"></script>
<!-- SELECT2-->
<script src="/Public-User/vendor/select2/dist/js/select2.js"></script>
<!-- DATATABLES-->
<script src="/Public-User/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/Public-User/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
<script src="/Public-User/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.bootstrap.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.colVis.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.flash.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.html5.js"></script>
<script src="/Public-User/vendor/datatables-buttons/js/buttons.print.js"></script>
<script src="/Public-User/vendor/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/Public-User/vendor/datatables-responsive/js/responsive.bootstrap.js"></script>
<script src="/Public-User/js/demo/demo-datatable.js"></script>
<!-- =============== APP SCRIPTS ===============-->
<script src="/Public-User/js/app.js"></script>
<script>
  function logout()
  {
    swal({
      title   : "Logout",
      text    : "Yakin Ingin Keluar?",
      icon    : "warning",
      buttons : [
        "Batal",
        "Logout",
      ],
    })
    .then((logout) => {
      if (logout) {
        swal({
          title  : "Logout",
          text   : "Anda Telah Logout",
          icon   : "success",
          timer  : 2500,
        });
        window.location = "/logout";
      } else {
        swal({
          title  : "Batal Logout",
          text   : "Anda Batal Logout",
          icon   : "info",
          timer  : 2500,
        })
      }
    });
  }
</script>
</body>

</html>
