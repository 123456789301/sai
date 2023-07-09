<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper"></div>
    <h1>Add Admin</h1>

    <br><br>

    <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>


            </tr>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" placeholder="Your Username">
                </td>



            </tr>

            <tr>
                <td>password</td>
                <td> <input type="password" name="password" placeholder="Enter Your Password"></td>


            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                </td>
            </tr>




        </table>
    </form>



</div>



<?php include("partials/footer.php"); ?>




<?php
//process the value from form and save it in database
// check whether the submit button is clicked or not



if (isset($_POST['submit'])) {

    //Button clicked
    //echo "Button clicked";

    // get the data from form


    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password Encryption with MD5


    // sql query to save data into database

    $sql = "INSERT INTO tbl_admin SET
      full_name= '$full_name',
      username='$username',
      password='$password'
    ";
    // Executing query and saving data into database

    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // check whether the query is executed data is inserted or not and display appropriate message

    if ($res == TRUE) {
        //data Inserted
        //echo 'Data Inserted';

        // create a session variable to Display message
        $_SESSION['add'] = "Admin Added Successfully";
        //Redirect Page TO manage admin
        header("location:" . SITEURL . 'admin/manage-admin.php');
    } else {
        //Failed to Inserted Data
        //// echo 'Faile to Insert Data';
        $_SESSION['add'] = " Failed to Add Admin";
        //Redirect Page TO Add Admin
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}


?>