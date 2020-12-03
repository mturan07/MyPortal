

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('portal') }}">
        <div class="sidebar-brand-text mx-3">My Portal</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      {{-- {{ Request::path() }} --}}
      {{-- {{ Request::segment(1) }} --}}
      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if(Request::path()=='/') active @endif">
        <a class="nav-link" href="{{route('portal')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span style="font-size: medium; color: rgb(240, 240, 240)">Anasayfa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <span class="anabaslik">İŞLEMLER</span>
      </div>

      <!-- Kayıt İşlemleri -->
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(1)=="kayitlar") in @else collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-edit"></i>
          <span style="font-size: 16px; color: rgb(240, 240, 240)">Kayıt İşlemleri</span>
        </a>
        <div id="collapseTwo" class="collapse @if(Request::segment(1)=="kayitlar") show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
            <a class="collapse-item @if(Request::segment(1)=="kayitlar" and !Request::segment(2)) active @endif" href="{{route('kayitlar.index')}}">Kayıt Listesi</a>
            <a class="collapse-item @if(Request::segment(1)=="kayitlar" and Request::segment(2)=="olustur") active @endif" href="{{route('kayitlar.create')}}">Kayıt Ekle</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <span class="anabaslik">TANIMLAR</span>
      </div>

      <!-- Ürün Tanımları -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-edit"></i>
          <span style="font-size: 16px; color: rgb(240, 240, 240)">Ürün Tanımları</span>
        </a>
        <div id="collapsePages" class="collapse  @if(Request::segment(1)=="urunler") show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if(Request::segment(1)=="urunler" and !Request::segment(2)) active @endif" href="{{route('urunler.index')}}">Ürün Listesi</a>
            <a class="collapse-item @if(Request::segment(1)=="urunler" and Request::segment(2)=="olustur") active @endif" href="{{route('urunler.create')}}">Ürün Ekle</a>
          </div>
        </div>
      </li>

      <!-- Birim Tanımları -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-edit"></i>
          <span style="font-size: 16px; color: rgb(240, 240, 240)">Birim Tanımları</span>
        </a>
        <div id="collapsePages1" class="collapse  @if(Request::segment(1)=="birimler") show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if(Request::segment(1)=="birimler" and !Request::segment(2)) active @endif" href="{{route('birimler.index')}}">Birim Listesi</a>
            <a class="collapse-item @if(Request::segment(1)=="birimler" and Request::segment(2)=="olustur") active @endif" href="{{route('birimler.create')}}">Birim Ekle</a>
          </div>
        </div>
      </li>

      <!-- Grup Tanımları -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-edit"></i>
          <span style="font-size: 16px; color: rgb(240, 240, 240)">Grup Tanımları</span>
        </a>
        <div id="collapsePages2" class="collapse @if(Request::segment(1)=="gruplar") show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if(Request::segment(1)=="gruplar" and !Request::segment(2)) active @endif" href="{{route('gruplar.index')}}">Grup Listesi</a>
            <a class="collapse-item @if(Request::segment(1)=="gruplar" and Request::segment(2)=="olustur") active @endif" href="{{route('gruplar.create')}}">Grup Ekle</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      @if (Auth::user()->yetki == 'Yönetici')

        <!-- Kullanıcı Tanımları -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-edit"></i>
            <span style="font-size: 16px; color: rgb(240, 240, 240)">Kullanıcı Tanımları</span>
          </a>
          <div id="collapsePages3" class="collapse @if(Request::segment(1)=="kullanicilar") show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item @if(Request::segment(1)=="kullanicilar" and !Request::segment(2)) active @endif" href="{{route('kullanicilar.index')}}">Kullanıcı Listesi</a>
              <a class="collapse-item @if(Request::segment(1)=="kullanicilar" and Request::segment(2)=="olustur") active @endif" href="{{route('kullanicilar.create')}}">Kullanıcı Ekle</a>
            </div>
          </div>
        </li>

        <!-- Kullanıcı Logları -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-edit"></i>
            <span style="font-size: 16px; color: rgb(240, 240, 240)">Kullanıcı Logları</span>
          </a>
          <div id="collapsePages4" class="collapse @if(Request::segment(1)=="loglar") show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item @if(Request::segment(1)=="loglar" and !Request::segment(2)) active @endif" href="{{route('loglar.index')}}">Kullanıcı Logları</a>
            </div>
          </div>
        </li>

      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Messages -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li> --}}

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 medium">{{Auth::user()->name}}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> 
                <div class="dropdown-divider"></div>
                --}}
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <strong> Çıkış</strong>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>

          <!-- Content Row -->