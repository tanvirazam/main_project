<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM banners_content";
$select_result=mysqli_query($db_connection,$select);




?>



<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Banner_Content_Table</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">

                        <tr>
                            <th>Sr</th>
                            <th>sub_title</th>
                            <th>title</th>
                            <th>des</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                         
                        <?php foreach($select_result as $key=>$user) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$user['sub_title']?></td>
                            <td><?=$user['title']?></td>
                            <td><?=$user['des']?></td>
                            <td><a href="banner_status_post.php?id=<?=$user['id']?>"><span class="badge bg-<?=($user['status']==1?'primary':'secondary')?>"><?=($user['status']==1?'Active':'Deactive')?></span></a></td>
                             <td>
                                     
                                     <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <a class="dropdown-item" href="banner_delete.php?id=<?=$user['id']?>">Delete</a>
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
                    <h3>Banner_Content</h3>
                </div>
             <div class="card-body">
                 <form action="banner_post.php" method="POST">
                    <div class="mb-3">
                    <input type="text" name="sub_title" class="form-control" placeholder="sub_title">
                    </div>
                    <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="tittle">
                    </div>
                    <div class="mb-3">
                    <input type="text" name="des" class="form-control" placeholder="des">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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