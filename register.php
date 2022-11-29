
<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="/brim/dashboard_accet/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="/brim/dashboard_accet/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="register_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="text" name="name" value="<?=(isset($_SESSION['name_value']))?$_SESSION['name_value']:''?>" class="form-control">
                                                  <?php 
                                                    if(isset($_SESSION['name_err'])){?>

                                                        <strong class="text-danger text-center"><?=$_SESSION['name_err']?></strong>

                                                    <?php 
                                                    }
                                                    ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" name="email" value="<?=(isset($_SESSION['email_value']))?$_SESSION['email_value']:''?>" class="form-control" 
                                             class="form-control" >
                                                    <?php 
                                                    if(isset($_SESSION['email_err'])){?>

                                                        <strong class="text-danger text-center"><?= $_SESSION['email_err']?></strong>
                                                    
                                                    <?php 
                                                    }
                                                    ?>
                   
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                                <?php    if(isset($_SESSION['password_err'])){?>

                                                <strong class="text-danger text-center"><?=$_SESSION['password_err']?></strong>

                                                <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Image</strong></label>
                                            <input type="file" name="image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <div class="div my-2">
                                                    <img width="200" src="" id="blah" alt="">
                                                </div>
                                                        
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                                    </div>
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
<script src="/brim/dashboard_accet/vendor/global/global.min.js"></script>
<script src="/brim/dashboard_accet/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/brim/dashboard_accet/js/custom.min.js"></script>
<script src="/brim/dashboard_accet/js/deznav-init.js"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if(isset($_SESSION['success'])){?>

<script>
Swal.fire({
position: 'top-end',
icon: 'success',
title: 'login successfully done',
showConfirmButton: false,
timer: 1500
})
</script>

<?php }
unset($_SESSION['success'])?>


<?php

if(isset($_SESSION['extension'])){?>

<script>
Swal.fire({
position: 'top-end',
icon: 'extension',
title:'<?=$_SESSION['extension']?>',
showConfirmButton: false,
timer: 1500
})
</script>

<?php }
unset($_SESSION['extension'])?>

</body>
</html>

<?php 

unset($_SESSION['name_err']);
unset($_SESSION['email_err']);
unset($_SESSION['password_err']);
unset($_SESSION['name_value']);
unset($_SESSION['email_value']);

?>