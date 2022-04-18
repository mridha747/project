        <!-- Sidebar -->
        <ul style ="background-color:#FD3D00;"class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"   >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user') ?>">
                <div class="sidebar-brand-icon rotate">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">STMIK Riau</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

 <li class="nav-item <?php if($this->uri->segment(2)=="") {
  echo " active";
 } ?>" >
        <a class="nav-link " href="<?= base_url(); ?>user">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>


    
    
      <li class="nav-item <?php if($this->uri->segment(2)=="edit") {
  echo " active ";
 } ?> "  >
        <a class="nav-link " href="<?= base_url('user/edit'); ?>">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Data Pribadi</span></a>
      </li>

     
 <li class="nav-item <?php if($this->uri->segment(2)=="kumpultugas") {
  echo " active ";
 } ?> "  >
        <a class="nav-link " href="<?= base_url('user/kumpultugas'); ?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Kumpul Tugas</span></a>
      </li>

  <hr class="sidebar-divider">
  <li class="nav-item <?php if($this->uri->segment(2)=="changepassword") {
  echo " active ";
 } ?>">
        <a class="nav-link  " href="<?= base_url('user/changepassword') ?>">
            <i class="fas fa-fw fa-cog"></i>
         
          <span>Ganti Password</span></a>
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
        <script type="text/javascript">
    $(document).ready(function(){
          $('.nav-item a').click(function(){
            $('.nav-item a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>