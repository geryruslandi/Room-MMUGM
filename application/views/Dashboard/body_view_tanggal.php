<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Dashboard Content-->
<div id="page-wrapper">
    <br>
    <label for="tanggal" style="display: block">Pilih Tanggal</label>
    <input name='tanggal' type="text" class="form-control" id="tanggal" style="width:150px;display: inline">
    <input type="button" class="btn btn-success" onclick="searchtanggal()" value="Search">
    <div class="col-md-12">
        <?php
            if(isset($ruangreservasi)){
                ?>
                <div class="row">

                    <br/>
                    <div class="row">

                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col col-xs-6">
                                        <h3 class="panel-title"><?php
                                            if(isset($ruangreservasi->keteranganerror)) {
                                                echo $ruangreservasi->tanggal;
                                            }
                                            else{
                                                echo $tanggal;
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <?php if($userdata->level == 'adm'){?><th><em class="fa fa-cog"></em></th><?php }?>
                                        <th style="display:none">id_ruang</th>
                                        <th>Ruang</th>
                                        <th>Mulai</th>
                                        <th>Akhir</th>
                                        <th>Pemakai</th>
                                        <th>Instansi</th>
                                        <th>Telefon</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($ruangreservasi->keteranganerror)) {
                                        ?>
                                        <tr><td colspan = "8" > Belum Ada Pemesanan Untuk Tanggal Ini </td ></tr>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <?php
                                        foreach ($ruangreservasi as $data){
                                            echo "<tr id='data_".$data->id."'>";
                                                if($userdata->level == 'adm'){
                                                    echo "<td align=\"center\">
                                                          <a onclick=\"edit(".$data->id.")\" class=\"btn btn-default\"><em class=\"fa fa-pencil\"></em></a>
                                                          <form action='".base_url()."dashboard/deletepemakaian' method='post' style='display:inline' onsubmit=\"return confirm('Anda Yakin Akan Menghapus Data?');\">
                                                            <input name='id' value='$data->id' style='display:none'/>
                                                            <button type=\"submit\" class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></button>
                                                        </form>
                                                        </td>";
                                                }
                                                echo "<td id='idRuang_".$data->id."'style='display:none'>".$data->id_ruang."</td>";
                                                echo "<td id='nama_".$data->id."'>".$data->nama."</td>";
                                                echo "<td id='mulai_".$data->id."'>".$data->jam_mulai."</td>";
                                                echo "<td id='selesai_".$data->id."'>".$data->jam_selesai."</td>";
                                                echo "<td id='pemakai_".$data->id."'>".$data->pemakai."</td>";
                                                echo "<td id='instansi_".$data->id."'>".$data->instansi."</td>";
                                                echo "<td id='telp_".$data->id."'>".$data->telp."</td>";
                                                echo "<td id='keterangan_".$data->id."'>".$data->keterangan."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                </div>
                            </div>
                        </div>

                    </div></div>
                <?php
            }
        ?>
    </div>

    <?php if($userdata->level == 'adm'){?>
    <div id="modalEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Pemesanan</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('dashboard/editdata_booking');?>
                    <input type="text" style="display: none" name="redirect" value="viewtanggal">
                    <input type="text" id="id_pemesanan"  style="display: none;" name="idPemesanan">
                    <div class="form-group  modalData">
                        <label for="ruang">Pilih Ruang</label>
                        <select class="form-control" id="ruang" name="ruang">
                            <?php
                            foreach ($ruang as $i){
                                echo "<option value=".$i->id.">".$i->nama."</option>";
                            }
                            ?>
                            ?>
                        </select>
                    </div>


                    <label for="jam_mulai">Jam Mulai:</label>
                    <div class="form-group input-group clockpicker">
                        <input type="text" class="form-control" id="jam_mulai" name="jam_mulai">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                    <label for="jam_akhir">Jam Akhir:</label>
                    <div class="form-group input-group clockpicker">
                        <input type="text" class="form-control" id="jam_akhir" name="jam_akhir">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        <input type="text" class="form-control" id="tanggalModal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="pemakai">Pemakai:</label>
                        <input type="text" class="form-control" id="pemakai" name="pemakai">
                    </div>

                    <div class="form-group">
                        <label for="instansi">Nama Instansi:</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                    </div>

                    <div class="form-group">
                        <label for="telefon">Nomor Telefon :</label>
                        <input type="text" class="form-control" id="telefon" name="telefon">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <textarea class="form-control" rows="5" id="keterangan" name="keterangan"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit!!">
                    </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php }?>

</div>
<script>
    //script search tanggal
    function searchtanggal(){
        var data = $('#tanggal').val();
        var hari = data.substr(0,2);
        var bulan = data.substr(3,2);
        var tahun = data.substr(6,4);
        window.location.href= '<?php echo base_url() ?>dashboard/viewtanggal/'.concat(hari).concat('/').concat(bulan).concat('/').concat(tahun);
    }

    <?php if($userdata->level == 'adm'){?>
    //script append and call modal
    function edit(id) {
        //passing value ke variable untuk append ke modal
        var nama = $('#idRuang_'.concat(id)).html();
        var mulai = $('#mulai_'.concat(id)).html();
        var selesai = $('#selesai_'.concat(id)).html();
        var tanggal = $('h3.panel-title').html();
        var pemakai = $('#pemakai_'.concat(id)).html();
        var instansi = $('#instansi_'.concat(id)).html();
        var telefon = $('#telp_'.concat(id)).html();
        var keterangan = $('#keterangan_'.concat(id)).html();

        //append value ke modal
        $('.modalData select').val(nama);
        $('#jam_mulai').val(mulai);
        $('#jam_akhir').val(selesai);
        $('#tanggalModal').val(tanggal);
        $('#pemakai').val(pemakai);
        $('#nama_instansi').val(instansi);
        $('#telefon').val(telefon);
        $('#keterangan').val(keterangan);
        $('#id_pemesanan').val(id);

        //buka modal
        $('#modalEdit').modal('toggle');


    }
    <?php }?>
</script>
<!-- /#page-wrapper -->