<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <link href="../css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='..//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/font.css" type="text/css"/>
    <link href="../css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/morris.css" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="../css/monthly.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="../js/jquery2.0.3.min.js"></script>
    <script src="../js/raphael-min.js"></script>
    <script src="../js/morris.js"></script>
    <style >
        body{
            background: url(../images/bck6.jpg);
            no-repeat 0px 0px;
            background-size:cover;
        }
    </style>
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="../dashboard/index.php" class="logo">
                    BALE ANAK
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <span  style="float: right; padding-top: 30px;padding-right: 30px;">
                <p class='fa fa-user'> Selamat Datang (<?php echo $_COOKIE["username"]; ?>) </p>
            </span>

            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
     <!-- <div class="top-nav clearfix"> -->
        <!--search & user info start
        <!- <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder=" Search">
            </li> -->
            <!-- user login dropdown start-->
            
            <!-- user login dropdown end -->

       <!--  </ul> -->
        <!--search & user info end-->
    <!-- </div> --> 
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
              <li>
                <a href="../dashboard/home.php">
                    <i class="fa fa-bullhorn"></i>
                    <span>Home </span>
                </a>
            </li>
             <li>
                <a href="../dashboard/logout.php?halaman=logout">
                    <i class="fa fa-user"></i>
                    <span>Logout  </span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Data Master</span>
                </a>
                <ul class="sub">
               
                    <li><a href="../dashboard/produk.php?halaman=produk">Data Produk</a></li>
                    <li><a href="../dashboard/kota.php?halaman=kota">Data Kota</a></li>
                    <li><a href="../dashboard/kategori.php?halaman=kategori">Data Kategori</a></li>
                    <li><a href="../dashboard/bank.php?halaman=bank">Data Bank</a></li>
                    <li><a href="../dashboard/kurir.php?halaman=kurir">Data Kurir</a></li>
         
          
             <!-- jika ada sudah login dengan level admin-->
                  <?php if ($_COOKIE['level'] == "admin"):  ?>
                    <li><a href="../dashboard/pelanggan.php?halaman=pelanggan">Data Pelanggan</a></li>
                    <li><a href="../dashboard/admin.php?halaman=admin">Data Users</a></li>

                </ul>
            </li>

            <li>
                <a href="../dashboard/orders.php?halaman=orders">
                    <i class="fa fa-bullhorn"></i>
                    <span>Pemesanan </span>
                </a>
            </li>

            <li>
                <a href="../dashboard/konfirmasipembayaran.php?halaman=konfirmasipembayaran">
                    <i class="fa fa-bullhorn"></i>
                    <span>Konfirmasi Pembayaran </span>
                </a>
            </li>

             <li>
                <a href="../dashboard/konfirmasipembayaran.php?halaman=konfirmasipembayaran">
                    <i class="fa fa-bullhorn"></i>
                    <span>Laporan </span>
                </a>
            </li>
            <?php endif; ?>
              
           

        </ul>            
    </div>
    <!-- sidebar menu end-->
</div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
 <section class="wrapper">
  