<body>

	<!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>

  <div id="main-wrapper" class="mini-sidebar">
		<!--================Header Menu Area =================-->
		<header class="topbar" data-navbarbg="skinAdmin1">
		  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
		    <div class="navbar-header" data-logobg="skinAdmin1">
		      <!-- This is for the sidebar toggle which is visible on mobile only -->
		      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
		      <!-- ============================================================== -->
		      <!-- Logo -->
		      <!-- ============================================================== -->
		      <a class="navbar-brand" href="<?php echo base_url(); ?>admin/">
		        <!-- Logo icon -->
		        <b class="logo-icon p-l-10">
		          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
		          <!-- Dark Logo icon -->
		          <img src="<?php echo base_url(); ?>assets/img/ico.png" alt="homepage" class="light-logo" style="width: 30px;height: 30px;" />

		        </b>
		        <!--End Logo icon -->
		        <!-- Logo text -->
		        <span class="logo-text">
		          <!-- dark Logo text -->
		          <b>PT</b> Persero Batam

		        </span>
		        <!-- Logo icon -->
		        <!-- <b class="logo-icon"> -->
		        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
		        <!-- Dark Logo icon -->
		        <!-- <img src="./assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

		        <!-- </b> -->
		        <!--End Logo icon -->
		      </a>
		      <!-- ============================================================== -->
		      <!-- End Logo -->
		      <!-- ============================================================== -->
		      <!-- ============================================================== -->
		      <!-- Toggle which is visible on mobile only -->
		      <!-- ============================================================== -->
		      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
		    </div>
		    <!-- ============================================================== -->
		    <!-- End Logo -->
		    <!-- ============================================================== -->
		    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skinAdmin1">
		      <!-- ============================================================== -->
		      <!-- toggle and nav items -->
		      <!-- ============================================================== -->
		      <ul class="navbar-nav float-left mr-auto">
		        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
		        <!-- ============================================================== -->
		        <!-- Search -->
		        <!-- ============================================================== -->
		      </ul>
		      <!-- ============================================================== -->
		      <!-- Right side toggle and nav items -->
		      <!-- ============================================================== -->
		      <ul class="navbar-nav float-right">
		        <!-- ============================================================== -->
		        <!-- End Comment -->
		        <!-- ============================================================== -->
		        <!-- ============================================================== -->
		        <!-- Messages -->
		        <!-- ============================================================== -->
		        <!-- ============================================================== -->
		        <!-- End Messages -->
		        <!-- ============================================================== -->

		        <!-- ============================================================== -->
		        <!-- User profile and search -->
		        <!-- ============================================================== -->
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/img/1.jpg" alt="user" class="rounded-circle" width="31"> &nbsp;<b class="text-white"><?php echo $this->session->userdata('name') ?></b></a>
		          <div class="dropdown-menu dropdown-menu-right user-dd animated">
		            <a class="dropdown-item" href="<?= base_url() . 'admin/logout.php'; ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
		          </div>
		        </li>
		        <!-- ============================================================== -->
		        <!-- User profile and search -->
		        <!-- ============================================================== -->
		      </ul>
		    </div>
		  </nav>
		</header>
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->