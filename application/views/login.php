<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/pnl.png">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

    <title>Sistem STK</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/flatlab/template_content/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/flatlab/template_content/')?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url('assets/flatlab/template_content/')?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/flatlab/template_content/')?>css/style.css" rel="stylesheet">
    <link href="<?=base_url('assets/flatlab/template_content/')?>css/style-responsive.css" rel="stylesheet" />
    <style type="text/css">
      .login-body{
        /*background: url(<?=base_url('assets/img/background1.jpg')?>) no-repeat center center fixed;*/
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        /*height: 100%; */
      }
      .form-signin {
        max-width: 500px;
        margin: 10px auto 0;
      }
      .head{
        margin: 50px auto 0; 
      }
      img.tengah{
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 200px;
      }
      .form-control{
        color: #484848;
      }
    </style>
</head>

  <body class="login-body">

    <div class="container">
      <div class="head">
        <img class="tengah" src="<?=base_url('assets/logo.jpg')?>">
        <!-- <h3 style="text-align: center;color: white; text-transform: uppercase;padding-top: -20px;">E-Lapor</h3> -->
      </div>
      <form class="form-signin" action="<?=site_url('Kerol/aksi_Login')?>" method="post">
        <h2 class="form-signin-heading"><b>Selamat Datang</b><br>STK</h2>
        <div class="login-wrap has-warning">
              <input type="text" class="form-control " name="email" placeholder="Masukkan Email...">
              <input type="password" class="form-control" name="password" placeholder="Masukkan Password...">
              <label class="checkbox">
                  <input type="checkbox" value="remember-me"> Lihat Password
              </label>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-danger btn-block" type="submit" style="color: white">Login</button>
                </div>  
              </div>
        </div>
      </form>
    </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('assets/flatlab/template_content/')?>js/jquery.js"></script>
    <script src="<?=base_url('assets/flatlab/template_content/')?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/sweetalert/')?>sweetalert.min.js"></script>


  </body>
</html>