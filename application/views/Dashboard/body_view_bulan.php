<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <br>
    <table id="pilihbulan">
        <tr>
            <td>Bulan :</td>
            <td>Tahun :</td>
            <td></td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <select class="form-control" id="bulan" name="bulan" style="max-width: 70px">
                        <?php
                        for($i=1 ; $i<=12 ; $i++){
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <select class="form-control" id="tahun" name="tahun" style="max-width: 100px">
                        <?php
                        for($i=2016 ; $i<=2030 ; $i++){
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
            </td>
            <td>
                <button type="button" class="btn btn-success" style="margin-top:-17px" onclick="selectbulan()"> Search</button>
            </td>
        </tr>
    </table>
    <br/>
    <?php

    if(isset($ruangreservasi)){

        ?>

        <div class="row">

            <div class="panel panel-default panel-table">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-xs-6">
                            <p style="font-size:30px" class="panel-title"><?php echo $tanggal->bulan." / ".$tanggal->tahun;?></p>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <?php if($userdata->level == 'adm'){?><th><center><em class="fa fa-cog"></em></center></th><?php }?>
                            <th style="display:none">id_ruang</th>
                            <th style="display: none"></th>
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
                            <?php
                                if($ruangreservasi == null){
                                echo "<tr><td colspan='8'>Belum ada data untuk bulan ini</td></tr>";
                            }
                            else
                            {
                                $hitungdata = count($ruangreservasi);
                                for ($i = 0 ; $i < $hitungdata ; $i++) {
                                    echo "<tr id='" . $ruangreservasi[$i]->id . "' style='background-color:#ffffff'>";

                                    if($userdata->level == 'adm') {
                                        echo "<td align=\"center\">
                                            <a onclick=\"edit(" . $ruangreservasi[$i]->id . ")\" class=\"btn btn-default\"><em class=\"fa fa-pencil\"></em></a>
                                            <a onclick=\"delete(" . $ruangreservasi[$i]->id . ")\" class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></a>
                                          </td>";
                                    }
                                    echo "<td id='tanggal_".$ruangreservasi[$i]->id."' style='display: none'>".$ruangreservasi[$i]->tanggal."</td>";
                                    echo "<td id='idRuang_".$ruangreservasi[$i]->id."'style='display:none'>".$ruangreservasi[$i]->id_ruang."</td>";
                                    echo "<td id='nama_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->nama . "</td>";
                                    echo "<td id='mulai_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->jam_mulai . "</td>";
                                    echo "<td id='selesai_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->jam_selesai . "</td>";
                                    echo "<td id='pemakai_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->pemakai . "</td>";
                                    echo "<td id='instansi_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->instansi . "</td>";
                                    echo "<td id='telp_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->telp . "</td>";
                                    echo "<td id='keterangan_".$ruangreservasi[$i]->id."'>" . $ruangreservasi[$i]->keterangan . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

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
                <input type="text" style="display: none" name="redirect" value="viewbulan">
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



<style>
    #pilihbulan tr td{
        padding: 5px;
    }
</style>
<script>
    function selectbulan() {
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();

        window.location.href = "<?php echo base_url()?>dashboard/viewbulan/".concat(bulan).concat("/").concat(tahun);
    }

    <?php if($userdata->level == 'adm'){?>
    function edit(id) {
        //passing value ke variable untuk append ke modal
        var nama = $('#idRuang_'.concat(id)).html();
        var mulai = $('#mulai_'.concat(id)).html();
        var selesai = $('#selesai_'.concat(id)).html();
        var tanggal = $('#tanggal_'.concat(id)).html();;
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
