<?php 

session_start();

require 'db.php';


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$after_hash=password_hash($password,PASSWORD_DEFAULT);
$upper=preg_match('@[A-Z]@',$password);
$uploaded_file=$_FILES['image'];

 
$flag=true;

if(empty($name)){

        $_SESSION['name_err']='enter your name';
        $flag=false;
 }
 if(empty($email)){
        $_SESSION['email_err']='enter your email';
         $flag=false;
        
}
else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['email_err'] = 'enter your valid email';
        $flag=false;
    }
}

if(empty($password)){
    $_SESSION['password_err']='enter your password';
     $flag=false;
    
}else{
    if(!$upper){
        $_SESSION['password_err']='enter upercase maintain';
        $flag=false;
    }else{

    }
}


if($flag){
  
    $select="SELECT COUNT(*) as exist FROM user WHERE email='$email'";
    $select_result=mysqli_query($db_connection,$select);
    $after_accos=mysqli_fetch_assoc($select_result);

    if($after_accos['exist'] == 1){
        $_SESSION['extension']='email already exit';
        header('location:register.php');
    }else{
        $after_exploded=explode('.',$uploaded_file['name']);
        $extension=end($after_exploded);
        $allowed_extension=array('jpg','jpeg','png');
        
        if(in_array($extension,$allowed_extension)){
            if($uploaded_file['size']<=512000){
        
                $insert="INSERT INTO user (name,email,password) VALUES('$name','$email','$after_hash')";
                mysqli_query($db_connection,$insert);
              
                $user_id=mysqli_insert_id($db_connection);
                 
                    $file_name=$user_id.'.'.$extension;
                    $new_location='uploads/user/'.$file_name;
    
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);
    
                    $update_user="UPDATE user SET image='$file_name' WHERE id=$user_id";
                    mysqli_query($db_connection,$update_user);
    
        
              
                      $_SESSION['success']='successfully';
                      header('location:register.php');
                
        
            }else{
                $_SESSION['extension']='size is not maximum';
                header('location:register.php');  
            }
        }else{
            $_SESSION['extension']='invalide image we are allowed(jpg,png,jepg)';
            header('location:register.php');
        }
    }



}
// flag end
else{
    $_SESSION['name_value']=$name;
    $_SESSION['email_value']=$email;
    header('location:register.php');
} 

?>