<?php 

if(!isset($_SESSION['firstName'])){

    $_SESSION['notLoggedIn'] = '<span class="fail" style="color: red;">Login Please!</span>';
    header('location:' .SITEURL.'index.php');
    
 }


?>