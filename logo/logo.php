<?php 
session_start();

require '../db.php';
require '../dashboard_parts/header.php';


$select="SELECT * FROM logos";
$select_result=mysqli_query($db_connection,$select);



?>

<div class="container">
    <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Logo List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped hover">
                    <tr>
                        <th>sr</th>
                        <th>logo</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_result as $key=>$logo) {?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><img width=200 src="../uploads/logo<?=$logo['logo']?>" alt=""></td>
                        <td><a href="logo_status.php?id=<?=$logo['id']?>"><span class="badge bg-<?=($logo['status']==1?'dark':'danger')?>"><?=($logo['status']==1?'Active':'Deactive')?></span></a></td>
                        <td>
                                     
                                                  <div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															
															<a class="dropdown-item" href="logo_delete.php?id=<?=$logo['id']?>">Delete</a>
														</div>
													</div>
                                </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
        <div class="col-lg-4">
        <div class="card">
                <div class="card-header">
                    <h3>Logo</h3>
                </div>
                <div class="card-body">
                <form action="logo_post.php" method="POST" enctype="multipart/form-data" >
                                      
                                        <div class=" mb-3 form-group">
                                            <input type="file" name="logo" class=form-control onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
                                            <img id="blah" width=100 src="" alt="">
                                        </div>
                                        <?php if(isset($_SESSION['error'])) {?>

                                            <strong class="text-danger"><?=$_SESSION['error']?></strong>

                                            <?php } unset($_SESSION['error'])?>
                                      
                                        <div >
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