<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
  <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/assets/css/print.min.css">
  <!-- <script src="/assets/css/print.css"></script> -->
  <script src="/assets/plugins/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="/assets/bower_components/angular/angular.min.js"></script>

  <style>
    @media screen {
      div.print-header {
        display: none;
      }

      div.print-body {
          display: none;
      }
      .center {
        margin: 0;
        position: absolute;
        align-items: center;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      }
    }

    @media print {
        div.print-header {
            /* display: block; */
            position: fixed;
            text-align: center;
        }
        div.print-body {
            /* display: block; */
            text-align: left;
        }
        @page { size: landscape; }
    }
    
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/authorization/logout" role="button">
            <b>LOGOUT</b>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?= base_url()?>" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Raja Laundry</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
             <h5 style="color:#C2C7D0;">Admin</h5>
            <a href="#" class="d-block"></a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url()?>panel-admin" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/profile" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pegawai" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pelanggan" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/jenis" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Jenis Laundry
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pemesanan" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/transaksi" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Traksaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/laporan" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>panel-admin">Home</a></li>
                <li class="breadcrumb-item active"><?= $title?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="data-flush" data-flash=""></div>