<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/dashboard/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: false
        });
    });
</script>


<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/data/morris-data.js"></script>


<!--Date Picker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script >

<!--ClockPicker-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>


<!--Custom CSS-->
<link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">


<script type="text/javascript">
    $('.clockpicker').clockpicker({
        align: 'left',
        donetext: 'Done'
    });
    $(function() {
        $("#tanggal").datepicker({ dateFormat: 'dd-mm-yy' });
        $("#tanggalModal").datepicker({ dateFormat: 'dd-mm-yy' });
    } );

</script >

</body>

</html>