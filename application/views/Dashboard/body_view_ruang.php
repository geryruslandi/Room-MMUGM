<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row" style="margin-top: 20px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 130px"><center><em class="fa fa-cog"></em></center></th>
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
                echo "<td align=\"center\">
                        <a onclick=\"edit(".$dataruang->id.")\" class=\"btn btn-default\"><em class=\"fa fa-pencil\"></em></a>
                        <form action='".base_url()."dashboard/deleteruangan' method='post' style='display:inline' onsubmit=\"return confirm('Anda Yakin Akan Menghapus Data?');\">
                            <input name='id' value='$dataruang->id' style='display:none'/>
                            <button type=\"submit\" class=\"btn btn-danger\"><em
                                                        class=\"fa fa-trash\"></em></button>
                        </form>
                      </td>";
                echo "<td id='nama_$dataruang->id'>".$dataruang->nama."</td>
                      <td id='lantai_$dataruang->id'>".$dataruang->lantai."</td>
                      <td id='kapasitas_$dataruang->id'>".$dataruang->kapasitas."</td>";

                echo"</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!--Edit Modal-->
<div id="editMdl" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('dashboard/editRuang');?>

                <input type="text" style="display: none" id="mdlId" name="id">

                <div class="form-group">
                    <label for="pemakai">Nama :</label>
                    <input type="text" class="form-control" id="mdlNama" name="nama">
                </div>

                <div class="form-group">
                    <label for="pemakai">lantai :</label>
                    <input type="number" class="form-control" id="mdlLantai" name="lantai">
                </div>

                <div class="form-group">
                    <label for="pemakai">Kapasitas :</label>
                    <input type="number" class="form-control" id="mdlKapasitas" name="kapasitas">
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

<script>
    function edit(data) {

        var nama = $("#nama_".concat(data)).html();
        var lantai = $("#lantai_".concat(data)).html();
        var kapasitas = $("#kapasitas_".concat(data)).html();


        $("#mdlId").val(data);
        $("#mdlNama").val(nama).attr('placeholder',nama);
        $("#mdlKapasitas").val(kapasitas).attr('placeholder',kapasitas);;
        $("#mdlLantai").val(lantai).attr('placeholder',lantai);;

        $("#editMdl").modal('show');
    }
</script>