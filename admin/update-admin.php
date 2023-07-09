<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php

        //1. Get The ID of selected Admin
        $id = $_GET['id'];


        //2. Create SQL Query to Get the Details
        $sql = "SELECT* FROM tbl_admin WHERE id=$id";

        //Execute Query

        $res = mysqli_query($conn, $sql);


        //check whether the data is available or not
        if ($res == true) {

            //check whether we have admin data or not   
            $count = mysqli_num_rows($res);
        }

        if ($count == 1) {
            // get the details
            echo "Admin Avialable";
            $row = mysqli_fetch_assoc($res);
            $full_name = $row['full_name'];
            $username = $row['username'];
        } else {
            //Redirect to manage Admin page
            header('location:'  . SITEURL . 'admin/manage-admin.php');
        }



        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="Enter Your Name">
                    </td>



                </tr>

                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Your Username">
                    </td>

                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update Admin" class="btn-secondary">

                    </td>



                </tr>


            </table>

        </form>

    </div>



</div>


<?php

//check whether the submit button is clicked or not 


if (isset($_POST['submit'])) {

    // echo "Button Clicked";
    echo $id = $_POST['id'];
    echo $full_name = $_POST['full_name'];
    echo $username = $_POST['username'];

    // create a SQL Query To update Admin

    $sql = "UPDATE tbl_admin SET
    full_name='$full_name',
    username='$username'

    WHERE id='$id'
     ";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not

    if ($res == true) {
        //query Executed and admin updated
        $_SESSION['update'] = "<div class='success'>Admin updated successfully.</div>";
        //Redirect to Manage Admin page
        header('location' . SITEURL . 'admin/manage-admin.php');
    } else {

        //Failed to updated Admin
        $_SESSION['update'] = "<div class='error'>Failed to Delete Admin</div>";
        //Redirect to Manage Admin page
        header('location' . SITEURL . 'admin/manage-admin.php');
    }
}









?>


<?php include('partials/footer.php'); ?>