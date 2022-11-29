<?php 
session_start();
require '../db.php';

require '../dashboard_parts/header.php';

$select="SELECT * FROM message";
$select_res=mysqli_query($db_connection,$select);

?>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Message List</h3>
                </div>
                <div class="card-body">
                   <table class="table table-borderd">
                   <tr>
                       <th>st</th>
                       <th>name</th>
                       <th>email</th>
                       <th>message</th>
                       <th>Active</th>
                    </tr>
                    <?php foreach($select_res as $key=>$mess) { ?>
                    <tr style="background-color:<?=($mess['status']==0)?'#ddd':''?>">
                        <td><?=$key+1?></td>
                        <td><?=$mess['name']?></td>
                        <td><?=$mess['email']?></td>
                        <td><?=$mess['message']?></td>
                        <td>
                             <a class="btn btn-primary" href="view.php?id=<?=$mess['id']?>">View</a>

                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 


require '../dashboard_parts/footer.php';

?>