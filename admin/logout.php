<?php
//include constant.php for SITEURL
include('../config/constant.php');
//1.Destroy the session
session_destroy(); // unset $_session ['user']

//redirect to kogin page
header('location:' . SITEURL . 'admin/login.php');
