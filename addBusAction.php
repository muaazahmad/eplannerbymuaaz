<?php
if(isset($_POST['submit']))
{
    include 'conn.php';
    
    $bName = $_POST['b_name'];
    $city = $_POST['b_city'];
    $area = $_POST['b_area'];
    $loaction = $_POST['b_location'];
    $opendays=$_POST['b_open'];
    $service=$_POST['b_service'];
    $bcharges=$_POST['b_charge'];
    $bcontact=$_POST['b_contact'];
    $imagename=$_FILES['image']['name']; //storing File Name
    $image_tempname=$_FILES['image']['tmp_name'];  //temp name store
    move_uploaded_file($image_tempname,"Upload_img/$imagename");
    // if($type=='for Event Booking')
    //     $userType = 'User';
    // else if($type=='as a Business Partner')
    //     $userType = 'Admin';
    // else
    //     $userType='dummy';
    $insert = mysqli_query($con, "INSERT INTO `add_business`(b_name, city, area, location,open_days,services,b_charges,b_contact,image) VALUES('$bName', '$city', '$area', '$loaction','$opendays','$service','$bcharges','$bcontact','$imagename')");
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