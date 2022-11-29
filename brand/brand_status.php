<?php 
session_start();
require '../db.php';


$id=$_GET['id'];

$select="SELECT * FROM brand WHERE id=$id";
$select_res=mysqli_query($db_connection,$select);
$after_accos=mysqli_fetch_assoc($select_res);

 
if($after_accos['status']==1){
    $select="SELECT COUNT( * ) as rrexist FROM brand WHERE status=0";
    $select_res=mysqli_query($db_connection,$select);
    $after_accos=mysqli_fetch_assoc($select_res);
   if($after_accos['rrexist'] >=4){
    $_SESSION['errrrr']='maximum 4 icon you can add';
        header('location:brand.php');
   }else{
    $update2="UPDATE brand SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update2);
    header('location:brand.php');
   }

    
}else{

    $select="SELECT COUNT( * ) as exist FROM brand WHERE status=1";
    $select_res=mysqli_query($db_connection,$select);
    $after_accos=mysqli_fetch_assoc($select_res);
  

    if($after_accos['exist'] >=6){
        $_SESSION['errrrr']='maximum 4 icon you can add';
        header('location:brand.php');
    }else{
    $update2="UPDATE brand SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update2);
    header('location:brand.php');
    }


}







?>