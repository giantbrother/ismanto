<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview">
          <a href="#">
             <i class="fa fa-barcode "></i> <span>Input PNP Per Stasiun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				
            <li><a class="nav-link" href="<?php echo base_url('Mrtpnp'); ?>"><i class="fa fa-circle-o"></i> Input Penumpang MRT</a></li>
            <li><a class="nav-link" href="<?php echo base_url().('Lrtpnp');?>"><i class="fa fa-circle-o"></i>Input Penumpang LRT</a></li>
			<li><a class="nav-link" href="<?php echo base_url('Kcipnp'); ?>"><i class="fa fa-circle-o"></i> Input Penumpang KCI</a></li>
			<li><a class="nav-link" href="<?php echo base_url('Railinkpnp'); ?>"><i class="fa fa-circle-o"></i> Input Penumpang Railink</a></li>
<<<<<<< HEAD
			<li><a class="nav-link" href="<?php echo base_url('Transjakartapnp'); ?>"><i class="fa fa-circle-o"></i> Input Penumpang Transjakarta</a></li>
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
			

		  </ul>
        </li>
		
		      <li class="treeview">
          <a href="#">
             <i class="fa fa-barcode "></i> <span>laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				
            <li><a class="nav-link" href="<?php echo base_url('Laporan'); ?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
			 <li><a class="nav-link" href="<?php echo base_url('Grafik'); ?>"><i class="fa fa-circle-o"></i> Grafik</a></li>
          <li><a class="nav-link" href="<?php echo base_url('Grafik1'); ?>"><i class="fa fa-circle-o"></i> Grafik1</a></li>
<<<<<<< HEAD
			<li><a class="nav-link" href="<?php echo base_url('Grafik2'); ?>"><i class="fa fa-circle-o"></i> Grafik2</a></li>
=======
			
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		  </ul>
        </li>

      
      <li <?php if ($page == 'input') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Input'); ?>">
          <i class="fa fa-book"></i>
          <span>Foam Input PNP Global</span>
        </a>
      </li>

      <li <?php if ($page == 'lRT') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Lrt'); ?>">
        <i class="fa fa-subway" aria-hidden="true"></i>
          <span> DB LRT</span>
        </a>
      </li>
      
      <li <?php if ($page == 'mrt') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Mrt'); ?>">
        <i class="fa fa-subway" aria-hidden="true"></i>
          <span>DB MRT</span>
        </a>
      </li>

      <li <?php if ($page == 'kci') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kci'); ?>">
        <i class="fa fa-train" aria-hidden="true"></i>
          <span>DB KCI</span>
        </a>
      </li>
	  
	        <li <?php if ($page == 'railink') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Railink'); ?>">
        <i class="fa fa-train" aria-hidden="true"></i>
          <span>DB Railink</span>
        </a>
      </li>
	  
<<<<<<< HEAD
	        <li <?php if ($page == 'transjakarta') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Transjakarta'); ?>">
=======
	        <li <?php if ($page == 'tj') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Tj'); ?>">
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
        <i class="fa fa-train" aria-hidden="true"></i>
          <span>DB Transjakarta</span>
        </a>
      </li>
<<<<<<< HEAD
	  
	  	<li <?php if ($page == 'peraturan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Peraturan'); ?>">
        <i class="fa fa-train" aria-hidden="true"></i>
          <span>Peraturan</span>
        </a>
      </li>
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e


      <li <?php if ($page == 'cctv') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Cctv'); ?>">
          <i class="fa fa-map-o"></i>
          <span>Cctv</span>
        </a>
      </li>

      <li <?php if ($page == 'user') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('User'); ?>">
          <i class="fa fa-user"></i>
          <span>User</span>
        </a>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>