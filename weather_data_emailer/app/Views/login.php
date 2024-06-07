<?php $session = session(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url('public/css/style-responsive.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('public/css/font.css'); ?>" type="text/css"/>
    <link href="<?php echo base_url('public/css/font-awesome.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('public/js/jquery2.0.3.min.js'); ?>"></script>
</head>
<body>
<div class="log-w3">
    <?php if ($session->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $session->getFlashdata('success'); ?>
        </div>
    <?php elseif ($session->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $session->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="w3layouts-main">
        <h2>Sign In Now</h2>
        <form id="loginForm" method="post" action="<?php echo base_url('login'); ?>">
            <input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
            <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
            <span><input type="checkbox" />Remember Me</span>
            <h6><a href="#">Forgot Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Sign In" name="login">
        </form>
        <p>Don't Have an Account ?<a href="<?php echo base_url('signup'); ?>">Create an account</a></p>
    </div>
</div>
<script src="<?php echo base_url('public/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
<script src="<?php echo base_url('public/js/scripts.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.nicescroll.js'); ?>"></script>
<script src="<?php echo base_url('public/js/jquery.scrollTo.js'); ?>"></script>

<script>
$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('login'); ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = '<?php echo base_url('index'); ?>';
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Login failed. Please try again.');
            }
        });
    });
});
</script>
</body>
</html>