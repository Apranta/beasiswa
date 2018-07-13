<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Portal Pengajuan</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="active nav-link" href="<?php echo base_url('admin') ?>">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/data-user') ?>">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">User</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/data-mahasiswa') ?>">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text">Mahasiswa</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/data-keluarga') ?>">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">Data Keluarga</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/data-pengajuan') ?>">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text">Data Pengajuan Beasiswa</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/data-jurusan') ?>">
              <i class="fa fa-fw fa-book"></i>
              <span class="nav-link-text">Data Jurusan</span>
            </a>
          </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
