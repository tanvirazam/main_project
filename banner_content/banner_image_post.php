<?php 
session_start();
require '../db.php';


$uploads=$_FILES['banner_image'];


$after_explode=explode('.',$uploads['name']);
$name=$uploads['name'];
$extension=end($after_explode);
 
$allow=array('jpg','png');

  


    if(in_array($extension,$allow)){
        if($uploads['size']<=10000000)

        $insert="INSERT INTO banner_image (banner_image) VALUES ('$name')";
        $insert_res=mysqli_query($db_connection, $insert);
           $insert_id=mysqli_insert_id($db_connection);
           $file_name= $insert_id. '.' .$extension;
           $new_location='../uploads/banner_image/'.$file_name;

           move_uploaded_file($uploads['tmp_name'],$new_location);

           $update="UPDATE banner_image SET banner_image='$file_name' WHERE id=$insert_id ";  
            //  ekhane id=doler id dile image dakhnur place a pic dakhabe na
           mysqli_query($db_connection,$update);
           header('location:banner_image.php');
          




    }else{
        $_SESSION['err']='Extension not match';
        header('location:banner_image.php');
    }





?>