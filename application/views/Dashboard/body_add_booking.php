<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div id="page-wrapper">
    <div class="panel panel-default" style="margin-top: 20px">
    <div class="col-md-12">
        <h2>Tambah Pemesan</h2>
        <hr>
    </div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php echo validation_errors(); ?>
                <?php echo form_open('dashboard/adddata_booking');?>

                <div class="form-group">
                    <label for="pemakai">Pemakai :</label>
                    <input type="text" class="form-control" id="pemakai" name="pemakai">
                </div>

                <div class="form-group">
                    <label for="ruang">Pilih Ruang</label>
                    <select class="form-control" id="ruang" name="ruang">
                        <?php
                        foreach ($ruang as $i){
                            echo "<option value=".$i->id.">".$i->nama."</option>";
                        }
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
                    <input type="text" class="form-control" id="tanggal" name="tanggal">
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
        </div>

</div>
</div>
