        <!-- Sidebar -->
        <ul style ="background-color:#FD3D00;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
                <div class="sidebar-brand-icon ">
                   <i class="fas fa-users-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size : 14px">E-LearnSTMIK Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

 <li class="nav-item <?php if($this->uri->segment(2)=="") {
  echo " active";
 } ?>">
        <a class="nav-link" href="<?= base_url('admin/index') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Dashboard</span></a>
      </li>

 <li class="nav-item <?php if($this->uri->segment(2)=="datamahasiswa") {
  echo " active";
 } ?>">
        <a class="nav-link" href="<?= base_url('admin/datamahasiswa') ?>">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Data Mahasiswa</span></a>
      </li>


      <li class="nav-item <?php
         if($this->uri->segment(2)=="datatugas") 
         {echo " active";} else if($this->uri->segment(2)=="tambahtugas"){
          echo " active";
         }
         ?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

      <i class="far fa-fw fa-file-alt"></i>
          <span>Tugas</span>
        </a>
        <div id="collapseTwo" class="collapse <?php
         if($this->uri->segment(2)=="tambahtugas") 
         {echo " show";} else if($this->uri->segment(2)=="datatugas"){
          echo " show";
         }
         ?> " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item <?php if($this->uri->segment(2)=="datatugas") {
  echo " show active ";
 } ?>" href="<?= base_url(''); ?>admin/datatugas">Data Tugas</a>
           

            <a class="collapse-item <?php if($this->uri->segment(2)=="tambahtugas") {
  echo " show active ";
 } ?>" href="<?= base_url(''); ?>admin/tambahtugas">Tambah Tugas</a>
          

          </div>
        </div>
      </li>


       <li class="nav-item <?php if($this->uri->segment(2)=="nilaimahasiswa") {
  echo " active";
 } ?>">
        <a class="nav-link" href="<?= base_url('admin/nilaimahasiswa') ?>">
          <i class="fas  fa-fw fa-crosshairs"></i>
   
          <span>Nilai Mahasiswa</span></a>
      </li>

      




  <hr class="sidebar-divider">


 <li class="nav-item <?php if($this->uri->segment(2)=="edit") {
  echo " active";
 } ?>">
        <a class="nav-link" href="<?= base_url('admin/edit') ?>">
        <i class="fas fa-fw fa-edit"></i>
          <span>Edit Profile</span></a>
      </li>



      <li class="nav-item <?php if($this->uri->segment(2)=="changepassword") {
  echo " active";
 } ?>">
        <a class="nav-link" href="<?= base_url('admin/changepassword') ?>">
         <i class="fas fa-fw fa-cog"></i>
          <span>Change Password</span></a>
      </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar --> 