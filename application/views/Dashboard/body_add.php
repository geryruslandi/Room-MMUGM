<!-- Dashboard Content-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
<div class="panel panel-default" style="margin-top: 20px">
    <div class="panel-body">
    <div class="col-md-12">
        <h2>Tambah Data</h2>
        <hr>
    </div>
    <div class="col-md-12">
        <?php echo validation_errors(); ?>
        <?php echo form_open('dashboard/adddata');?>

        <div class="form-group">
            <label for="namaruang">Nama Ruang</label>
            <input name='namaruang' type="text" class="form-control" id="namaruang" style="width: 600px">
        </div>
        <div class="form-group">
            <label for="Lantai">Lantai:</label>
            <input type="number" class="form-control" id="lantai" name="lantai" style="width: 60px;">
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas:</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" style="width: 100px">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Submit!!">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalMasterRuang">Lihat Data Ruang</button>
        </div>
        </form>
    </div>
    </div>
</div>

    <!-- Modal -->
    <div id="modalMasterRuang" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ruang Yang Telah Ada</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Lantai</th>
                            <th>Kapasitas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($ruang as $dataruang)
                        {
                            echo "<tr id='ruang_".$dataruang->id."'>";
                            echo "<td>".$dataruang->nama."</td><td>".$dataruang->lantai."</td><td>".$dataruang->kapasitas."</td>";
                            echo"</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /#page-wrapper -->