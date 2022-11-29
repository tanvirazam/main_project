<?php 
session_start();

require '../db.php';

$name=$_POST['name'];
$old_password=$_POST['old_password'];
$password=$_POST['password'];
$after_hash=password_hash($password,PASSWORD_DEFAULT);

$id=$_POST['id'];



if(empty($password)){

    $update="UPDATE  user SET name='$name' WHERE id=$id";
    $update_result=mysqli_query($db_connection,$update);
    header('location:profile.php');
}else{
    $select="SELECT * FROM user WHERE id=$id";
    $select_result=mysqli_query($db_connection,$select);
    $after_accos=mysqli_fetch_assoc($select_result);

    if(password_verify($old_password,$after_accos['password'])){
        $update="UPDATE  user SET name='$name', password='$after_hash' WHERE id=$id";
        $update_result=mysqli_query($db_connection,$update);
        header('location:profile.php');
    }else{
        $_SESSION['wrong']='old password does not match';
        header('location:profile.php');
    }


}



?>