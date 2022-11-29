<?php 

require '../db.php';


$id=$_GET['id'];
$select="SELECT * FROM social WHERE id=$id";
mysqli_query($db_connection,$select);

$delete="DELETE FROM social WHERE id=$id";
mysqli_query($db_connection,$delete);
header('location:social.php');
?>