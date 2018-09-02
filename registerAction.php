<?php
if(isset($_POST['submit']))
{
    include 'conn.php';
    
    $u_id = $_POST['u_id'];
    $u_name = $_POST['u_name'];
    $u_contact = $_POST['u_contact'];
    $u_email = $_POST['u_email'];
    $u_password=$_POST['u_password'];
    $u_create_at=$_POST['u_create_at'];
    
    // if($type=='for Event Booking')
    //     $userType = 'User';
    // else if($type=='as a Business Partner')
    //     $userType = 'Admin';
    // else
    //     $userType='dummy';
    $insert = mysqli_query($con, "INSERT INTO `users`(u_id,u_name,u_contact, u_email,u_password,u_create_at) VALUES('$u_id', '$u_name', '$u_contact', '$u_email','$u_password','$u_create_at')");
    if($insert)
    {
        $_SESSION['msg'] = 'Sign Up Successfully';
        header("location:addbusiness.html");
    }
    else
    {
        $_SESSION['msg'] = 'Error in Sign Up due to reason > '.mysqli_error($con);
        header("location:Dashboard/signup.php");
    }

}
?>\