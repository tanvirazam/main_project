<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM service";
$select_result=mysqli_query($db_connection,$select);




?>



<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3>Service List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">

                        <tr>
                            <th>Sr</th>
                            <th>icon</th>
                            <th>link</th>
                            <th>title</th>
                            <th>pera</th>
                            <th>status</th>
                            <th>Action</th>

                        </tr>
                         
                        <?php foreach($select_result as $key=>$user) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><a href=""><li style="font-family:fontawesome;" class="<?=$user['icon']?>"></li></a></td>
                            <td><a href="<?=$user['link']?>">link</a></td>
                            <td><?=$user['title']?></td>
                            <td><?=$user['pera']?></td>
                            <td><a href="service_status.php?id=<?=$user['id']?>"><span class="badge bg-<?=($user['status']==1?'danger':'primary')?>"><?=($user['status']==1?'Active':'Deactive')?></span></a></td>
                            <td>

                            <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <a class="dropdown-item" href="service_delete.php?id=<?=$user['id']?>">Delete</a>
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
                    <h3>Add Education</h3>
                </div>

                <?php 
                    $font=array(
                       'fab fa-react',
                       'fab fa-pinterest',
                       'fab fa-free-code-camp',
                       'fal fa-desktop',
                       'fal fa-edit',
                       'fal fa-headset',

                    )
                ?>
             <div class="card-body">
                 <form action="service_post.php" method="POST">
                    <div class="mb-3">

                        <?php foreach($font as $icon) { ?>
                        
                    
                        <i data-link="<?=$icon?>" style="font-family:fontawesome; font-size:20px;" class=" <?=$icon?> icon_class"></i>

                        <?php } ?>
                        <input type="text" readonly name="icon" id="icon" class="form-control">

                    <div>
                    <div class="mb-3">
                            <input type="text" name="link" class="form-control" placeholder="link" >
                    <div>
                    <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="title" >
                    <div>
                    <div class="mb-3">
                            <input type="text" name="pera" class="form-control" placeholder="pera" >
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






<script>
    $('.icon_class').click(function(){
        var icon_class=$(this).attr('data-link');
        $('#icon').attr('value',icon_class);
    })
</script>