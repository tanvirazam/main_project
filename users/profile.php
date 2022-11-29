

<?php


session_start();
require '../session_check.php';
require '../db.php';
require '../dashboard_parts/header.php';


$id=$_SESSION['id'];
$select="SELECT * FROM user WHERE id=$id";
$select_result=mysqli_query($db_connection,$select);
$after_accos=mysqli_fetch_assoc($select_result);


?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update Form</h3>
                </div>
                <div class="card-body">
                <form action="profile_info_uodate.php" method="POST" >
                                        <div class=" mb-3 form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="hidden" name="id" value="<?=$after_accos['id']?>" class="form-control">
                                            <input type="text" name="name" value="<?=$after_accos['name']?>" class="form-control" >
                                           
                                        </div>
                                        <div class=" mb-3 form-group">
                                            <label class="mb-1 text-white"><strong>Old Password</strong></label>
                                            <input type="password"  name="old_password" class="form-control" value="old Password">
                                            <?php if(isset($_SESSION['wrong'])){?>
                                            <strong class="text-danger"><?=$_SESSION['wrong']?></strong>
                                            <?php } unset($_SESSION['wrong'])?>
                                        </div>
                                      
                                        <div class=" mb-3 form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password"  name="password" class="form-control" value="Password">
                                        </div>
                                      
                                        <div >
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    
                </div>
            </div>
            
            
           
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update image Form</h3>
                </div>
                <div class="card-body">
                <form action="profile_image_update.php" method="POST" enctype="multipart/form-data">
                                       
                                        <div class=" mb-5 form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="hidden"  name="id" class="form-control" value="<?=$after_accos['id']?>">
                                            <input type="file"  name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <br><br><br><br>
                                            <img id="blah"  width="100" src="../uploads/user/<?=$after_accos['image']?>" alt="">
                                            <?php 
                                                if(isset($_SESSION['err'])){?>
                                                    <strong class="text-danger"><?=$_SESSION['err']?></strong>
                                                <?php } unset($_SESSION['err']) ?>
                                           
                                        </div>
                                                <br><br>
                                        <div >
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    
                </div>
            </div>
            
            
           
        </div>
    </div>
</div>

<?php

require '../dashboard_parts/footer.php';

?>