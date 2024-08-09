<?php 

include('config/config.php');
session_destroy(); //remove all sessions and more importantly  $_SESSION['firstname'] for authentication purposes!
header('location:' .SITEURL. 'index.php')


?>