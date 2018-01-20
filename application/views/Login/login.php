<?php
    //$_SESSION['captcha'] = captcha();
    //var_dump($_SESSION);
?>

<html class="bg-navy">
    <head>

        <?php echo $this->session->flashdata('alert'); ?>
        <link rel="shortcut icon" href="http://career.mm.feb.ugm.ac.id/register/assets/img/favicon.ico" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="<?php echo base_url()?>asset_login/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/frameworks/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>asset_login/AdminLTE.css" rel="stylesheet" type="text/css">

        <!-- DATE TIME PICKER -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset_login/jquery.datetimepicker.css">
        <!-- Popup Modal CRUD -->
        <script src="<?php echo base_url()?>asset_login/jquery.min.js"></script>
        <style>
            .modal-dialog {
                width: 100%;
            }
        </style>
    </head>

    <body class="bg-navy">
    <div class="form-box" id="login-box">
        <div class="header"><img src="<?php echo base_url()?>asset_login/logo_cnc.png" height="150" alt="MMUGM Career Network Center"></div>
        <!--Peringatan untuk validasi-->
        <?php echo validation_errors(); ?>

        <?php echo form_open('login/validating'); ?>
            <div class="body bg-gray">

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" autofocus="" class="form-control" value="" placeholder="Username" required>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <br>

            </div>
            <div class="footer">
                <input name="Login" type="submit" value="L O G I N" class="btn bg-navy btn-block">
                <center>
                    <table><tbody><tr>

                            <td>
                                <marquee behavior="scroll" direction="left" scrollamount="1">
                                    Helpdesk: <i class="fa fa-user"></i> <small> Arief (HP: +6282221472587)</small>
                                </marquee>
                            </td>
                        </tr></tbody></table>
                </center>

                <hr> <strong>Copyright © 2017 | <a href="http://career.mm.feb.ugm.ac.id/">CNC MMUGM</a>.</strong> All rights reserved.
            </div>
        </form>

    </div>
    </body>

</html>