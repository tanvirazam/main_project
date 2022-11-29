<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';

$select="SELECT * FROM education";
$select_result=mysqli_query($db_connection,$select);




?>



<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Education List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">

                        <tr>
                            <th>Sr</th>
                            <th>title</th>
                            <th>year</th>
                            <th>percentege</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                         
                        <?php foreach($select_result as $key=>$user) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$user['title']?></td>
                            <td><?=$user['year']?></td>
                            <td><?=$user['percentage']?></td>
                            <td><a href="education_status.php?id=<?=$user['id']?>"><span class="badge bg-<?=($user['status']==1?'danger':'secondary')?>"><?=($user['status']==1?'Active':'Deactive')?></span></a></td>
                             <td>
                                     
                                     <div class="dropdown">
                                           <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                               <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                           </button>
                                           <div class="dropdown-menu">
                                               
                                               <button data-link="delete_edu.php?id=<?=$user['id']?>" class="dropdown-item edu_class" href="">Delete</button>
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
             <div class="card-body">
                 <form action="education_post.php" method="POST">
                    <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                    <div class="mb-3">
                    <input type="number" name="year" class="form-control" placeholder="year">
                    </div>
                    <div class="mb-3">
                    <input type="number" name="percentage" class="form-control" placeholder="percentage">
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

<script>
    $('.edu_class').click(function(){
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
   
    var link = $(this).attr('data-link');
    window.location.href=link;
  }
})
    })
</script>

<?php if(isset($_SESSION['delete'])) { ?>

        <script>
            Swal.fire(
                'Deleted!',
                '<?=$_SESSION['delete']?>',
                'success'
                )
        </script>

    <?php } unset($_SESSION['delete'] )  ?>
