<?php include('partials/menu.php'); ?>


<div class="main-content">

    <div class="wrapper">
        <h1>Add Category</h1>

        <br /> <br />


        <?php


        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }




        ?>

        <br> <br>




        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="category Title">
                    </td>

                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>

                    <td>Featured</td>

                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>


                <tr>

                    <td>Active</td>
                    <td>
                        <input type="radio" name="Active" value="Yes"> Yes
                        <input type="radio" name="Active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">

                    </td>
                </tr>

            </table>

        </form>


        <?php

        // check whether button click or not

        if (isset($_POST['submit'])) {

            //echo "clicked";

            $title = $_POST['title'];



            if (isset($_POST['featured'])) {

                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }


            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {

                $active = "No";
            }

            //check whether omage selected or not and set value for image name according
            // print_r($_FILES['image']['name']);

            // die(); // break the code here

            if (isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                //upload the image only if image is selected
                if ($image_name != "") {

                    //auto rename our image
                    //get the extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"

                    $ext = end(explode('.', $image_name));

                    //Rename the image
                    $image_name = "Food_category_" . rand(000, 999) . "." . $ext;



                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);


                    // check whether images is upload or not 
                    // not uploaded images stop process and redirect to  error message

                    if ($upload == false) {

                        $_SESSION['upload'] = "<div class='error'>Failed to upload images.</div>";

                        header('location:' . SITEURL . 'admin/add-category.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }



            $sql = "INSERT INTO  tbl_category SET 
            title='$title',
            image_name='$image_name',

            featured= '$featured',
            active=  '$active'
            ";

            $res = mysqli_query($conn, $sql);




            if ($res == true) {
                $_SESSION['add'] = "<div class='success text-center'> category Added Successfully.</div>";
                //redirect to manage category


                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {

                $_SESSION['add'] = "<div class='error text-center'> Failed to Add category.</div>";
                //redirect to manage category

                header('location:' . SITEURL . 'admin/add-category.php');
            }
        }


        ?>

    </div>



</div>






<?php include('partials/footer.php'); ?>