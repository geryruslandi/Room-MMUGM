<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/mmugm.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manajement Ruang | Magister Management UGM</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dashboard/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->session->flashdata('alert'); ?>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>">Manajement Ruang </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a><i class="fa fa-user fa-fw"></i> <?php echo $userdata->name;?> </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-table fa-fw" aria-hidden="true"></i> Lihat Data<span class="fa arrow fa-fw"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo base_url() ?>dashboard/hari"><i class="fa fa fa-clock-o fa-fw"></i>Lihat Data Per Hari</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>dashboard/bulan"><i class="fa fa-calendar fa-fw"></i>Lihat Data Per Bulan</a>
                                </li>
                                <?php if($userdata->level == 'adm'){?>
                                <li>
                                    <a href="<?php echo base_url()?>dashboard/ruang"><i class="fa fa-building fa-fw"></i>Lihat Data Ruangan</a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php
                        //jika userdata nya adalah admin ,maka add data bisa di akses
                        if($userdata->level == 'adm') {
                            ?>
                            <li>
                                <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data<span class="fa arrow fa-fw"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="<?php echo base_url() ?>dashboard/addmaster"><i class="fa fa-plus fa-fw"></i> Tambah Master Ruang</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>dashboard/addbooking"><i class="fa fa-plus fa-fw"></i> Tambah Pemesanan</a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="<?php echo base_url()?>dashboard/export"><i class="fa fa-file-excel-o fa-fw" aria-hidden="true"></i> Export Record Pemesanan</a>
                            </li>

                            <?php
                        }
                        else{
                            ?>
                            <li>
                                <a href="<?php echo base_url() ?>dashboard/status"><i class="fa fa-eye fa-fw" aria-hidden="true"></i> Status Ruangan</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>





