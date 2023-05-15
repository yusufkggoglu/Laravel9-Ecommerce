<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{asset('assets')}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets')}}/admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <li class="nav-item">
                <a href="/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anasayfa</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/collection" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Koleksiyon</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/slider" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slayt</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/faq" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sıkça Sorulan Sorular</p>
                </a>
              </li>
          </li>
          @auth()
          <li class="nav-item">
            <li class="nav-item">
                <a href="/admin/setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ayarlar</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="{{route('logoutuser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Çıkış</p>
                </a>
              </li>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- /.sidebar -->