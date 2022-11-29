<?php 

session_start ();
require 'db.php';





$email=$_POST['email'];
$password=$_POST['password'];

$select="SELECT COUNT(*) as exist FROM `user` WHERE email='$email'";
$select_result=mysqli_query($db_connection,$select);
$after_assco=mysqli_fetch_assoc($select_result);


// echo $after_assco['exist']; email dakhche


if($after_assco['exist'] == 1){
    $user_password="SELECT * FROM user WHERE email='$email'";
    $user_password_query=mysqli_query($db_connection,$user_password);
    $after_assco_password=mysqli_fetch_assoc($user_password_query);
    if(password_verify($password,$after_assco_password['password'])){
       
        $_SESSION['korche']='login korche';
        $_SESSION['id']=$after_assco_password['id'];
        header('location:dashboard.php');
    }else{
        $_SESSION['invalide']='Wrong password';
    header('location:login.php');
    }

}
else{

    $_SESSION['invalide']='invalide email';
    header('location:login.php');
}




?>

