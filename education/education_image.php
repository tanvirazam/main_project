<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM edu_image";
$select_res=mysqli_query($db_connection,$select);


?>


<div class="container">
    <div class="row">
    <div class="col-lg-8">
        <table class="table table-striped">
            <tr>
                <th>sr</th>
                <th>image</th>
                <th>status</th>
                <th>Delete</th>
                
            </tr>
            <?php foreach($select_res as $key=>$about) { ?>
            <tr>
                <td><?=$key+1?></td>
                <td><img width="100" src="../uploads/image_about/<?=$about['image']?>" alt=""></td>

               <td><a href="edu_status.php?id=<?=$about['id']?>"><span class="badge bg-<?=$about['status']?'danger':'success'?>"><?=$about['status']==1?'Active':'Deactive'?></span></a></td>
                <td> 
                                     <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <button data-link="education_image_delete.php?id=<?=$about['id']?>"  class="dropdown-item icon_class" href="">Delete</button>
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
                    <form action="education_image_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                        <input type="file" name="image" class="form-control" placeholder="image">
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


<?php 

   

if(isset($_SESSION['err'])){?>

<script>
        Swal.fire({
        position: 'top-end',
        icon: 'extension',
        title:'<?=$_SESSION['err']?>',
        showConfirmButton: false,
        timer: 1500
        })
        </script>

    <?php }
    unset($_SESSION['err']) ?>



    <script>
        $('.icon_class').click(function(){
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
             var icon_class=$(this).attr('data-link');
            window.location.href=icon_class;
  }
})
        })
    </script>



<?php if(isset($_SESSION['deletggge'])) { ?>

            <script>
             Swal.fire(
                'Deleted!',
                '<?=$_SESSION['deletggge']?>',
                'success'
                )
                    
            </script>

<?php } unset($_SESSION['deletggge']) ?>

