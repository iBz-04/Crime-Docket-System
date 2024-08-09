<?php include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenuU.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Settings Page</h1>
          </div>

          <div class="userBox flex">
          <a href="index.php">
            <div class="adminImage">
              <img src="./assets/images/pp.jpg" alt="Admin Image">
            </div>
          </a>
          <div class="userName">
            <span>Administrator</span>
            <small><?php 
            
            if(isset($_SESSION['firstName'])){
              echo $_SESSION['firstName'];
            }
           
            
            
            ?></small>
          </div>
          <i class="uil uil-bell icon"></i>
          </div>
        </div>

        <div class="body">
        <div class="overViewDiv">
           <div class="intro flex" >
             <h3 class="title">Settings</h3>
             <?php 
              if(isset($_SESSION['settings'])){
                echo $_SESSION['settings'];
                unset($_SESSION['settings']);
              }
             ?>
            <div class="addBtn">
              <a href="dashboardU.php">
                <span>Save Settings</span>
              </a>
            </div>
           </div>
          </div>

          <?php 
            // Get the values from the database=========>
            $fstName = $_SESSION['firstName'];
            $sql = "SELECT * FROM admins WHERE first_name = '$fstName'";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE){
                $count = mysqli_num_rows($res);
                if($count==1){
                    while($row = mysqli_fetch_assoc($res)){
                        $fName = $row['first_name'];
                        $sName = $row['second_name'];
                        $eID = $row['atp_id'];
                        $role = $row['admin_role'];
                        $password = $row['admin_pswrd'];
                    }

                }
                else{
                    header('location:' .SITEURL. 'settingsU.php');
                    exit();
                }
            }
          
          ?>

       
          
          <div class="mainItems">
            <div class="addCaseContainer flex">

            <div class="rowsDiv">
              <form action="" method="POST">
              <div class="row">
                <label for="firstName">First Name <small>Click to change</small></label>
                <input type="text" name="firstName"  id="firstName" value="<?php echo $fName;?>">
               </div>
              <div class="row">
                <label for="secondName">Second Name <small>Click to change</small></label>
                <input type="text" name="secondName" id="secondName" value="<?php echo $sName;?>">
               </div>
               <div class="row">
                <label for="id">Employee ID No. <small>Click to change</small></label>
                <input type="text" name="id"  id="id" >
                <input type="hidden" name="targetID"  value="<?php echo $eID;?>">
               </div>

               <div class="row">
                <label for="currentPassword">Current Password <small>Click to change</small></label>
                <input type="password" name="currentPassword" id="currentPassword" >
                <input type="hidden" name="currPassword" value="<?php echo $password;?>">
               </div>
              
              
            </div>
            <div class="rowsDiv">
            <div class="row">
                <label for="newPassword">New Password <small>Click to change</small></label>
                <input type="password" name="newPassword"  id="newPassword" >
               </div>
               <!-- <div class="row">
                <label for="confirmPassword">confirm Password <small>Click to change</small></label>
                <input type="password"  name="confirmPassword" id="confirmPassword" placeholder="kubrom.1">
               </div> -->
              
               <div class="row">
                    <input type="hidden" name="targetAdmin" value="<?php echo $fstName; ?>">
                      <input type="submit" name="submit" id="submitBtn" value="Update">
                    </div>
            </div>
            </form>
            </div>

          </div>
        

        </div>
      </div>
  </div>



<?php include('partials/footer.php')?>

<?php 
if(isset($_POST['submit'])){

  // get the input and assign them to variables
  $targetAdmin = $_POST['targetAdmin'];
  $currPassword = $_POST['currPassword'];
  $firstName = $_POST['firstName'];
  $secName = $_POST['secondName'];
  $targetID = $_POST['targetID'];
  $empID = $_POST['id'];
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];

  if($currPassword == $currentPassword && $targetID == $empID){
          $sql = "UPDATE admins SET
          first_name = '$firstName',
          second_name = '$secName',
          atp_id = '$empID',
          admin_pswrd = '$newPassword'

        WHERE first_name = '$fstName'";

      $res = mysqli_query($conn,$sql);
        if($res == TRUE){
                  $_SESSION['settings']  = '<span class="success">Updates successful!</span>';
                  header('location:' .SITEURL. 'settingsU.php');
                  exit();
                }
                else{
                  $_SESSION['settings']  = '<span class="fail">Something wrong!</span>';
                  header('location:' .SITEURL. 'settingsU.php');
                  exit();
                }
  }
  else{
    $_SESSION['settings']  = '<span class="fail">Either Emp ID or Current Password is wrong!</span>';
    header('location:' .SITEURL. 'settingsU.php');
    exit();
  }

  
  
}


?>