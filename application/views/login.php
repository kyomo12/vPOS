<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 24/04/2018
 * Time: 11:38
 */
?>
<html lang="en" class="body-full-height">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- META SECTION -->
    <title>POS | Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container">

    <div class="login-box animated fadeInDown">
        <!-- <div class="login-logo"></div> -->

        <div class="login-body">
            <h2 style="margin-left: 80px; text-decoration: blink; color: #903212">POS</h2>
            <div class="login-title"><strong>Welcome</strong>, Please login</div>
            <form action="<?php echo base_url(); ?>welcome/home" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" value="smanager@vodacom.com" class="form-control" placeholder="Username"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" value="123" class="form-control" placeholder="Password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block">Forgot password?</a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url(); ?>welcome/home" class="btn btn-info btn-block">Log In</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="login-footer">
            <div class="pull-left">
                &copy; 2019 POS Vodacom
            </div>
            <div class="pull-right">
                <a href="#">About</a> |
                <a href="#">Privacy</a> |
                <a href="#">Contact Us</a>
            </div>
        </div> -->
    </div>

</div>
</body>
</html>


