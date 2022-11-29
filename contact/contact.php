<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM contact";
$select_res=mysqli_query($db_connection,$select);
$after_accos=mysqli_fetch_assoc($select_res);

?>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Contract List</h3>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Sr</th>
                            <th>pera</th>
                            <th>adress</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>delete</th>
                        </tr>

                        <?php foreach($select_res as $key=>$cont) { ?>

                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$cont['pera']?></td>
                            <td><?=$cont['adress']?></td>
                            <td><?=$cont['email']?></td>
                            <td><?=$cont['phone']?></td>
                            <td><div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                           <button data-link="contact_delete.php?id=<?=$cont['id']?>" class="form-control icon_class">Delete</button>
                                              
                                           </div>
                                       </div></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Contract List</h3>
                </div>
                <div class="card-body">
                    <form action="contact_post.php" method="POST">
                        <div class="mb-3">
                            <textarea  type="text" name="pera" class="form-control" placeholder="pera"></textarea >
                        </div>
                        <div class="mb-3">
                            <input type="text" name="adress" class="form-control" placeholder="address">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="phone" class="form-control" placeholder="phone">
                        </div>
                        <div class="mb-3">
                           <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require '../dashboard_parts/footer.php';
?>

<?php

if(isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?=$_SESSION['success']?>',
  showConfirmButton: false,
  timer: 1500
})
    </script>
<?php } unset($_SESSION['success']) ?>

<!-- sure delete start -->
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
     var link=$(this).attr('data-link');
     window.location.href=('value',link);
  }
})

    })
</script>

<?php if(isset($_SESSION['errrrr'])) { ?>
     
  <script>
      Swal.fire(
      'Deleted!',
      '<?=$_SESSION['errrrr']?>',
      'success'
    )
  </script>

<?php } unset($_SESSION['errrrr']) ?>

<!-- sure delete end -->
