<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM testimonial";
$select_resu=mysqli_query($db_connection,$select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8"> 
            <div class="card">
                <div class="card-header">
                    <h3>Banner List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>sr</th>
                            <th>image</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach($select_resu as $key=>$user){ ?>

                        <tr>
                            <td><?=$key+1?></td>
                            <td><img width=100 src="../uploads/testimonial/<?=$user['image']?>" alt=""></td>
                            <td><a href="testimonial_img_status.php?id=<?=$user['id']?>"><span class="badge bg-<?=($user['status']==1)?'danger':'primary'?>"><?=($user['status']==1)?'Active':'Deactive'?></span></a></td>
                            <td>

                            <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <a class="dropdown-item" href="testimonial_img_delete.php?id=<?=$user['id']?>">Delete</a>
                                           </div>
                                       </div>

                            </td>
                            
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Image</h3>
                </div>
                <div class="card-body">
                    <form action="testimonial_img_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                                    <strong class="test-danger"><?=$_SESSION['err']?></strong>
                            <?php } unset($_SESSION['err']) ?>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Image</button>
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