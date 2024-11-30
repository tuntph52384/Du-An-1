<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black;">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link text-center">
    <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><i class="nav-icon fas fa-home">ADMIN</i></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">


      <div class="info">
        <a href="#" class="align-middle" style="color: white"><strong>Shop Nước Hoa</strong></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt" style="color: white"></i>
            <p style="color: white" >
              Thống kê
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th" style="color: white"></i>
            <p style="color: white">
              Danh mục sản phẩm
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
          <i class="nav-icon fas fa-book-open" style="color: white"></i>

            <p style="color: white">
              Quản lý sản phẩm
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang'  ?>" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar" style="color: white"></i>
            <p style="color: white">
              Quản lý đơn hàng
            </p>
          </a>
        </li>



       
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user" style="color: white"></i>
            <p style="color: white">
              Quản lý tài khoản
            </p>
            <i class="fas fa-angle-left right" style="color: white"></i>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon far fa-user" style="color: white"></i>
                <p style="color: white">
                  Tài khoản quản trị
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                <i class="nav-icon far fa-user" style="color: white"></i>
                <p style="color: white">
                  Tài khoản khách hàng
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon far fa-user" style="color: white"></i>
                <p style="color: white">
                  Tài khoản cá nhân
                </p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>