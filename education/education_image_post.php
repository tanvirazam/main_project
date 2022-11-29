<?php 
session_start();
require '../db.php';

$uploads=$_FILES['image'];

$explode=explode('.',$uploads['name']);
$extension=end($explode);
$name=$uploads['name'];

$allow=array('jpg','png');



if(in_array($extension,$allow)){

    if($uploads['size'] <=10000000){
        $insert="INSERT INTO edu_image(image) VALUES('$name')";
        $insert_res=mysqli_query($db_connection,$insert);
        $insert_id=mysqli_insert_id($db_connection);



        $file_name=$insert_id.'.'.$extension;
        $new_location='../uploads/image_about/'.$file_name;
        move_uploaded_file($uploads['tmp_name'],$new_location);



        $update="UPDATE edu_image SET image='$file_name' WHERE id=$insert_id";
        mysqli_query($db_connection,$update);
        header('location:education_image.php');
    }else{
        $_SESSION['err']='size not matching';
        header('location:education_image.php');
    }


}else{
    $_SESSION['err']='extension not matching';
    header('location:education_image.php');
}



?>