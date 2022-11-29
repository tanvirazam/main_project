<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM edu_about";
$select_res=mysqli_query($db_connection,$select);


?>


<div class="container">
    <div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <tr>
                <th>sr</th>
                <th>about</th>
                <th>pera</th>
                <th>Delete</th>
            </tr>
            <?php foreach($select_res as $key=>$about) { ?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$about['about']?></td>
                <td><?=$about['pera']?></td>
                <td> 
                                     <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <a  class="dropdown-item" href="delete_edu_banner.php?id=<?=$about['id']?>">Delete</a>
                                           </div>
                                       </div></td>
            </tr>

            <?php } ?>
        </table>
    </div>
        
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                        
                        <h3>Banner image</h3>
                </div>
                <div class="card-body">
                    <form action="education_baner_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                        <input type="text" name="about" class="form-control" placeholder="about">
                        </div>
                        <div class="mb-3">
                        <input type="text" name="pera" class="form-control" placeholder="pera">
                        </div>
                        <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>


<?php 

require '../dashboard_parts/footer.php';

?>