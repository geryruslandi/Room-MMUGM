<!DOCTYPE HTML>
<html>
    <head>
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/mmugm.png" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frameworks/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
        <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    </head>
    <body>

        <div class="container">

            <div class="panel-group">
                <div class="panel panel-default panel-login">
                    <div class="panel-body">
                        <center><img src="<?php echo base_url()?>assets/img/mmugm.png" alt="logo MM UGM" style="width: 300px;margin:30px 0 30px 0"></center>
                        <hr>
                        <!--Peringatan untuk validasi-->
                        <?php echo validation_errors(); ?>

                        <?php echo form_open('login/validating'); ?>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="name"  placeholder="Enter your Name" value/>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="name"  placeholder="Enter your password"/>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" value="Login">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>