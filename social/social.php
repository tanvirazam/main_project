<?php 
session_start();

require '../db.php';
require '../dashboard_parts/header.php';


$select="SELECT * FROM social";
$select_result=mysqli_query($db_connection,$select);



?>

<div class="container">
    <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Icon List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped hover">
                    <tr>
                        <th>sr</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                        <?php foreach($select_result as $key=>$icoon) { ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><li style="font-family:fontawesome;" class="<?=$icoon['icon']?>"></li></td>
                        <td><a href="social_status.php?id=<?=$icoon['id']?>"><span class="badge bg-<?=($icoon['status']==1)?'Primary':'Danger'?>"><?=($icoon['status']==1)?'Active':'Deactive'?></span></a></td>
                        <td><a href="<?=$icoon['link']?>">Link</a></td>
                        <td>

                        <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <a class="dropdown-item" href="social_delete.php?id=<?=$icoon['id']?>">Delete</a>
                                           </div>
                                       </div>


                        </td>
                    </tr>

                    <?php } ?>
                    
                </table>
            </div>
        </div>
    </div>
        <div class="col-lg-12">
        <div class="card">
                <div class="card-header">
                    <h3>Add Icon</h3>
                </div>
                <?php 
                    $fonts = array (

                        
                        'fab fa-instagram',
                        'fab fa-pinterest',
                   
                      
                      );
                
                ?>
                <div class="card-body">
                <form action="social_post.php" method="POST" >

                    <div class="mb-3">
                       <?php foreach($fonts as $icon) { ?>
                        <i data-icon="<?=$icon?>" style="font-family:fontawesome;" class="<?=$icon?> icon_class "></i>
                        <?php } ?>

                        <input type="text" readonly name="icon" id="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                    <input type="text" name="link"  class="form-control" placeholder="Link">
                    </div>
                           
                <div mb-3 >
                       <button type="submit" class="btn btn-primary">Add Logo</button>
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
        
        var icon_class=$(this).attr('data-icon');
       $('#icon').attr('value',icon_class);
    })
</script>



<?php if(isset($_SESSION['errrrr'])) { ?>
     <script>
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: $_SESSION['errrrr'],

}) 

  

    </script>
    <?php } unset ($_SESSION['errrrr']) ?>


