<?php 

include('config/config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- css Link -->
    <link rel="stylesheet" href="./index.css">
    <!-- Icons link -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container flex">
       
        <div class="loginPage flex">
            <div class="introSection">
                <div class="sectionText flex">
                    <h2 class="title">
                        Welcome Admin!
                    </h2>
                    <p>Thanks for being authentic!</p>
                </div>
            </div>
            <div class="inputSection flex">
                <div class="closeIcon flex">
                    <i class="uil uil-times-circle icon"></i>
                </div>
              <h2>Welcome Back!</h2>
              <span>Login to continue</span>

              <?php 
              
              if(isset($_SESSION['noAdmin'])){
                  echo $_SESSION['noAdmin'];
                  unset ($_SESSION['noAdmin']);
              }
              if(isset($_SESSION['notLoggedIn'])){
                  echo $_SESSION['notLoggedIn'];
                  unset ($_SESSION['notLoggedIn']);
              }
              
              ?>

              <form action="" method="POST">
                  <div class="inputs">
                      <div class="loginFirstname">
                        <input type="text" name="loginFirstname" id="email" placeholder="Enter First Name" required>
                        <i class="uil uil-user icon"></i>
                      </div>
                      <div class="passwordInput">
                        <input type="password" name="loginPassword" id="password" placeholder="Enter Password" required>
                        <i class="uil uil-lock icon"></i>
                      </div>
                      
                      <div class="btn">
                      <input type="submit" name="submit" id="loginBtn" value="LOGIN">
                      </div>
<span></span>
                   
                  </div>
              </form> 
              
                  
              

            </div>
        </div>

        
    </div>
    
</body>
</html>
<?php 

if(isset($_POST['submit'])){
     $firstName = $_POST['loginFirstname'];
     $loginPassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM admins WHERE first_name='$firstName' AND admin_pswrd='$loginPassword'";

    $res = mysqli_query($conn,$sql);
 
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);
        if($count==1 && $row['admin_role']=='Admin'){
            $_SESSION['loginMessage'] = '<span class="success">Welcome ' .$firstName. '!</span>';
            $_SESSION['firstName'] = $firstName;
            header('location:' .SITEURL. 'dashboard.php');
            exit();
            
        }
        
        else if($count==1 && $row['admin_role']=='Editor'){
            $_SESSION['loginMessage'] = '<span class="success">Welcome ' .$firstName. '!</span>';
            $_SESSION['firstName'] = $firstName;
            header('location:' .SITEURL. 'dashboardU.php');
            exit();
    
        }else{
            $_SESSION['noAdmin'] = '<span class="fail" style="color: red;"> Name or Password is incorrect!</span>';
            $_SESSION['firstName'] = $firstName;
            header('location:' .SITEURL. 'index.php');
            exit();
        }
    
}


?>
