<?php 

include('config/config.php');

// get individual ID ====================>
$deleteBtnId = $_GET['id'];

$sql = "DELETE FROM admins WHERE id= $deleteBtnId";
$result = mysqli_query($conn, $sql);
if($result==TRUE){
    $_SESSION['deleteAdmin'] = '<span class="success">Administrator deleted successfully!</span>';
    header('location:' .SITEURL. 'administrators.php');
}
else{
    $_SESSION['deleteAdmin'] = '<span class="fail">Failed to delete Administrator</span>';
    header('location:' .SITEURL. 'administrators.php');
}

?>