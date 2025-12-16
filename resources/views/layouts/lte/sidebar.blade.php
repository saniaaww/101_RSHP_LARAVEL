<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" 
         alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" 
             class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.jenis.index') }}" class="nav-link">
            <i class="nav-icon fas fa-paw"></i>
            <p>Jenis Hewan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.ras.index') }}" class="nav-link">
            <i class="nav-icon fas fa-dog"></i>
            <p>Ras Hewan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.kategori.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>Kategori</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.kategori-klinis.index') }}" class="nav-link">
            <i class="nav-icon fas fa-notes-medical"></i>
            <p>Kategori Klinis</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.kode-tindakan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-stethoscope"></i>
            <p>Kode Tindakan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.pet.index') }}" class="nav-link">
            <i class="nav-icon fas fa-cat"></i>
            <p>Daftar Pet</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.role.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Daftar Role</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.user.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Daftar User</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.rekam-medis.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file-medical"></i>
            <p>Rekam Medis</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.detail.index', 1) }}" class="nav-link">
            <i class="nav-icon fas fa-file-medical"></i>
            <p>Detail Rekam Medis</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.temu-dokter.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Temu Dokter</p>
          </a>
        </li>


      </ul>
    </nav>

  </div>
  <!-- /.sidebar -->
</aside>
