<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <br>
    <?php echo form_open('dashboard/viewstatus');?>
    <label for="tanggal" style="display: block">Pilih Tanggal</label>
    <input name='tanggal' type="text" class="form-control" id="tanggal" style="width:150px;display: inline">
    <select name="ruang" id="" class="form-control" style="display: inline;width: auto">
        <?php
        foreach ($dataruang as $data) {
            echo "<option value='$data->id'>$data->nama</option>";
        }
        ?>
    </select>
    <input type="submit" class="btn btn-success" onclick="searchtanggal()" value="Search">
    <hr>
    <div class="row">
        <?php if(isset($dataruangstatus)){?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Nama Ruang</td>
                    <td>Mulai</td>
                    <td>Selesai</td>
                    <td>Pemakai</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($dataruangstatus) != 0 ){
                    foreach ($dataruangstatus as $data){
                        echo "<tr>";
                        echo "<td>$data->tanggal</td>";
                        echo "<td>$data->nama</td>";
                        echo "<td>$data->jam_mulai</td>";
                        echo "<td>$data->jam_selesai</td>";
                        echo "<td>$data->pemakai</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>