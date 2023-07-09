<?php
// incluse constant page
include('../config/constant.php');

//echo "delete page";
//check whether the id and image _name value
if (isset($_GET['id']) and isset($_GET['image_name'])) {

    // echo "Get Value and Delete";

    // get the value and delete

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //remove physical image file is available
    if ($image_name != "") {
        //image is available . so remove it
        $path = "../images/category/" . $image_name;
        //remove the image


        $remove = unlink($path);
        //if failed to remove image then add an error message and stop the process
        if ($remove == false) {

            $_SESSION['remove'] = "<div class='error'>Failed to remove categroy image.</div>";
            //redirect to manage categroy page
            header('location:' . SITEURL . 'admin/manage-category.php');
            //stop the process
            die();
        }
    }
    //delete data from database
    //sql query to delete data from database

    $sql = "DELETE * FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    //check whether  the data is delete from database or not
    if ($res == true) {

        ////set success message and redirect
        $_SESSION['delete'] = "<div class='success'>category Deleted successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        //set fail message redirect
        $_SESSION['delete'] = "<div class='error'>Failed to Delete category.</div>";
        //redirect to manage category
        header('location:' . SITEURL . 'admin/manage-category.php');
    }

    //redirect to manage categroy page with message





} else {



    // redirect to manage categroy page
    header('location:'  . SITEURL . 'admin/manage-category.php');
}
