<?php

// include constants.php file here
include('..//config/constant.php');


// 1. get the ID of Admin to be deleted

$id = $_GET['id'];

//2. create SQL query to delete admin


$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query

$res = mysqli_query($conn, $sql);


if ($res == true) {

    //query Executed Successfully and Admin deleted
    // echo "Admin Deleted";
    // create session variable to display message
    $_SESSION['delete'] =  "<div class='success'>Admin Deleted Successfully.</div>";
    // Redirect to manage admin page
    header('location:'  . SITEURL . 'admin/manage-admin.php');
} else {

    // Failed to delete Admin
    // echo "Failed to Deleted Admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin Page Try Again later.</div>";
    header('location:' . SITEURL . 'admin/manage-admin.php');
}

//3. Redirect to manage admin page with message (sucess/error)
