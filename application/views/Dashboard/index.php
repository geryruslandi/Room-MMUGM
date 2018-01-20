<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div id="page-wrapper">
    <div style="padding-top: 10px">
        <p style="font-size: 30px">Melihat Data</p>
        <hr style="margin-top: 0px">
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-hourglass-half fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 style="margin-top: 2px">Data Perhari</h3>
                                <div>Lihat data record perhari</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url()?>dashboard/hari">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 style="margin-top: 2px;font-size: 20px">Data Perbulan</h3>
                                <div>Lihat data record perbulan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url()?>dashboard/bulan">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php if($userdata->level == 'adm'){?>
        <hr>
        <p style="font-size: 30px">Tambah Data</p>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #27ae60">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plus fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 style="margin-top: 2px;font-size: 21px">Tambah Pemesanan</h3>
                                <div>Tambah data untuk pemesanan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url()?>dashboard/addbooking">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #27ae60">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plus-circle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 style="margin-top: 2px;font-size: 20px">Tambah Master Ruang</h3>
                                <div>Tambah data untuk master ruangan</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url()?>dashboard/addmaster">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <hr>
            <p style="font-size: 30px">Export Data</p>
            <hr>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color: #EC644B">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-excel-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 style="margin-top: 2px;font-size: 20px">Export Data Ruang</h3>
                                <div>Export data ruang menjadi file excell</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url()?>dashboard/export">
                        <div class="panel-footer">
                            <span class="pull-left">Export</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>















