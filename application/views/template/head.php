<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Kerol Azraman</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/flatlab/template_content/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/flatlab/template_content/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>assets/flatlab/template_content/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href="<?=base_url()?>assets/flatlab/template_content/css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/flatlab/template_content/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/flatlab/template_content/css/style-responsive.css" rel="stylesheet" />
     <!-- COPI DARI SINI -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/set2.css" />
    <style type="text/css"> 
      #tombol:hover{
        transition: all 0.3s linear;
        background: transparent;
        border-color: #00b297;
        color: #00b297;
      }
      img#gambar:hover{
        opacity: 0.4;
        filter: alpha(opacity=40);
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
      } 
      #panel{
        border: solid 1px red;
      }
      #panel #p-head{
        background: red;
        color: white;
      }
      .btn-danger{
        background-color: red;
      }
      
      #p-cari{
        padding-left: 40px;padding-right: 40px; padding-top: 20px; padding-bottom: 10px;
      }
      .full-width .nav > li > a:hover, .full-width .nav  li.active a, .full-width .nav li.dropdown a:hover , .full-width .nav li.dropdown.open a:focus, .full-width .nav .open > a, .full-width  .nav .open > a:hover, .full-width  .nav .open > a:focus{
          background-color: red;
          text-decoration: none;
          color: #fff;
          transition: all 0.3s ease 0s;
          -webkit-transition: all 0.3s ease 0s;
      }
      .form-control{
        color: black
      }
      #button :hover{
        color: red;
      }
      #logout{
        background-color: red;
        color: white;
        font-size: 12px;
      }
    </style>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/flatlab/template_content/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/flatlab/template_content/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>assets/flatlab/template_content/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/flatlab/template_content/js/hover-dropdown.js"></script>
    <script src="<?=base_url()?>assets/flatlab/template_content/js/jquery.scrollTo.min.js"></script>
    <!-- <script src="<?=base_url()?>assets/flatlab/template_content/js/jquery.nicescroll.js" type="text/javascript"></script> -->
    <script src="<?=base_url()?>assets/flatlab/template_content/js/respond.min.js" ></script>
    <script type="text/javascript" src="<?=base_url('assets/sweetalert/')?>sweetalert.min.js"></script>

    <!--common script for all pages-->
    <!-- <script src="<?=base_url()?>assets/flatlab/template_content/js/common-scripts.js"></script> -->

  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
              </button>

              <!--logo start-->
              <a href="<?=site_url()?>" class="logo" >Sistem Tata Kerja</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                <?php if ($lev == 'admin'): ?>
                  <ul class="nav navbar-nav">
                      <li class=""><a href="<?=site_url()?>">Data STK</a></li>
                      <li class=""><a href="<?=site_url('Kerol/index/menu_sk')?>">Data SK</a></li>
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"  href="#">Input Data <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="<?=site_url('Kerol/index/form_sk')?>">Data Surat Keputusan</a></li>
                              <li><a href="<?=site_url('Kerol/index/form_stk')?>">Data Sistem Tata Kerja</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"  href="#">Master Data <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="<?=site_url('Kerol/index/data_kelompok')?>">Data Kelompok</a></li>
                              <li><a href="<?=site_url('Kerol/index/data_fungsi')?>">Data Fungsi</a></li>
                              <li><a href="<?=site_url('Kerol/index/data_bisnis')?>">Data Bisnis</a></li>
                              <li><a href="<?=site_url('Kerol/index/data_user')?>">Data User</a></li>
                          </ul>
                      </li>
                  </ul>
                <?php elseif($lev == 'operator'): ?>
                  <ul class="nav navbar-nav">
                      <li class=""><a href="">Dashboard</a></li>
                  </ul>
                <?php endif ?>
              </div>
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <!-- user login dropdown start-->
                      <li class="dropdown">
                          <a class="dropdown-toggle" href="<?=site_url('Kerol/Logout')?>" id="logout"> Log Out
                          </a>
                      </li>
                      <!-- user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>