<?php 
session_start();
require '../db.php';

$id=$_POST['id']; 




$uploads=$_FILES['image'];

$explored=explode('.',$uploads['name']);
$extension=end($explored);
$allow_extension=array('jpg','png');


if(in_array($extension,$allow_extension)){
    if($uploads['size']<=10000000000000){

        $select="SELECT * FROM user WHERE id=$id";
        $select_result=mysqli_query($db_connection,$select);
        $after_accos=mysqli_fetch_assoc($select_result);
        $delete_from='../uploads/user/'.$after_accos['image'];
         unlink($delete_from);




        $file_name=$id.'.'.$extension;
        $new_location='../uploads/user/'.$file_name;
        move_uploaded_file($uploads['tmp_name'],$new_location);

        $update="UPDATE user SET image='$file_name' WHERE id=$id";
        $update_result=mysqli_query($db_connection,$update);
        header('location:profile.php');

    }else{
    $_SESSION['err']='size does not match!';
    header('location:profile.php');
    }

}else{
    $_SESSION['err']='extension does not match!';
    header('location:profile.php');
}

 ?>