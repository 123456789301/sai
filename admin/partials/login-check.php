<?php

//Authorization-Access Control
//Check whether the user is logged in or not

if (!isset($_SESSION['user'])) // if user session is not set

{
    $_SESSION['no-login-message'] = "<div class='error text-center'>login to access admin panel.</div>";
    header('location:' . SITEURL . 'admin/login.php');
}
