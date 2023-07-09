<?php

include('../config/constant.php');




?>


<html>

<head>
    <title>Login -Food order system</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>

        <!--Login form starts Her--->

        <?php

        if (isset($_SESSION['login'])) {

            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }


        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }

        ?>

        <br><br>

        <form action="" method="POST" class="text-center">

            UserName: <br>
            <input type="text" name="username" placeholder="Enter User Name"><br><br>


            password: <br>
            <input type="password" name="password" placeholder="Enter password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>





        </form>

        <!---Login form ends here-->

        <p class="text-center">Created By - <a href="www.LathishRajinikanth.com">LathishRajinikanth</a></p>

    </div>
</body>





</html>



<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // sql to check ehether the user with username and password exists or not

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

    //execute the query

    $res = mysqli_query($conn, $sql);

    // count rows to check whether user exists or not

    $count = mysqli_num_rows($res);

    if ($count == 1) {

        // user available login success
        $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
        $_SESSION['user'] = $username; // To check whether the user is looged in or not and logout will unset it
        //Redirect to home page dashboard
        header('location' . SITEURL . 'admin/');
    } else {

        // Failed to login 



        $_SESSION['login'] = "<div class='error text-center'>user or password did not match.</div>";
        //Redirect to home page
        header('location' . SITEURL . 'admin/login.php');
    }
}




?>