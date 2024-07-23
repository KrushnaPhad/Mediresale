<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mediresale-Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Forgot Password</h4>
                                    <!-- flash message code -->
                                    <?php if (session()->has('msg')): ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= session()->get('msg') ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    <!-- flash message code end-->
                                    <form action="<?php echo base_url('/send_email') ?>" method="POST">
                                        <div class="form-group">
                                            <label><strong>Enter your email</strong></label>
                                            <input type="text" name="email" class="form-control" value="" id="email">
                                        </div>
                
                                        
                                        <div class="text-center ">
                                            <button type="submit" class="btn btn-primary btn-block mt-4 mb-2">Send Email</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/vendor/global/global.min.js');?> "></script>
    <script src="<?= base_url('assets/js/quixnav-init.js');?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js');?>"></script>

</body>

</html>