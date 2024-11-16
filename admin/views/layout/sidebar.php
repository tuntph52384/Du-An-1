<aside class="main-sidebar sidebar-dark-primary elevation-4" >
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
        <a href="#" class="d-block"><strong>Nước Hoa Dior</strong></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Trang chủ
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN .'?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th" ></i>
            <p >
             Quản lý danh mục sản phẩm
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
          <i class="bi bi-luggage-fill"></i>
            <p>
             Quản lý sản phẩm
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
             Quản lý đơn hàng
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Quản lý tài khoản
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>