<?php 
session_start();
require '../db.php';

$select_user="SELECT * FROM user";

$all_user=mysqli_query($db_connection, $select_user);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<?php
require '../dashboard_parts/header.php';
?>
    <div class="container m-auto">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-success">
                        <h3 class="text-white">table</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover">

                        <tr>
                            <th>id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>

                        <?php foreach($all_user as $key=>$user){?>

                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$user['name']?></td>
                                <td><?=$user['email']?></td>
                                <td><img width="50" src="../uploads/user/<?=$user['image']?>" alt=""></td>
                                <td>
                                     
                                                  <div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															
															<a class="dropdown-item" href="delete.php?id=<?=$user['id']?>">Delete</a>
														</div>
													</div>
                                </td>
                            </tr>


                         <?php }?>
                       

                        

                       

                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
require '../dashboard_parts/footer.php';
?>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_SESSION['deleted'])){?>
        <script>
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '<?=$_SESSION['deleted']?>',
                showConfirmButton: false,
                timer: 1500
                })
        </script>
        <?php }unset($_SESSION['deleted'])?>
</body>


</html>