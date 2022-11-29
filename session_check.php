<?php 

        session_start(); 
        if(!$_SESSION['korche']){
        header('location:login.php');
}
?>