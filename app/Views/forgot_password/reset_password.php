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
                                    <h4 class="text-center mb-4">Reset Password</h4>
                                   <!-- flash message code -->
                                   <?php if (session()->has('success')): ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= session()->get('success') ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif; ?>
                                    <!-- flash message code end-->
                                    <form id="updatePasswordForm" action="<?php echo base_url('/update_password') ?>" method="POST">
                                        <div class="form-group">
                                            <label><strong>Enter new Password</strong></label>
                                            <input type="text" name="new_password" class="form-control" value="" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="text" name="confirm_password" class="form-control" value="" id="email">
                                        </div>
                
                                        
                                        <div class="text-center ">
                                        <input type="hidden"  name="id" id="id" class="form-control" value="<?php echo $id;?>">  

                                            <button type="submit" class="btn btn-primary btn-block mt-4 mb-2">Update Password</button>
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


     <!-- Bootstrap Modal -->
     <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="modalOkButton">OK</button>
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


   
    <script>
        $(document).ready(function() {
            $('#updatePasswordForm').on('submit', function(event) {
                event.preventDefault(); 

                $.ajax({
                    url: '<?php echo base_url('update_password') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        //console.log('AJAX Success:', response); 
                        var modalMessage = $('#modalMessage');
                        if (response.status === 'success') {
                            modalMessage.html(response.message);
                            $('#responseModal').modal('show'); 
                            $('#modalOkButton').on('click', function() {
                                setTimeout(function() {
                                    window.location.href = '<?php echo base_url('/') ?>'; // Redirect to login page after closing modal
                                }, 0);
                            });
                        } else {
                            modalMessage.html(response.message); 
                            $('#responseModal').modal('show'); 
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //console.error('AJAX Error:', textStatus, errorThrown); 
                        $('#modalMessage').html('An error occurred. Please try again.'); 
                        $('#responseModal').modal('show'); 
                    }
                });
            });
        });
    </script>



</body>

</html>