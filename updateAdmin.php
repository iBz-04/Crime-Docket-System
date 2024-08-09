<?php 
include('partials/headerSection.php');
ob_start();
?>


  <div class="main">
      <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Update Administrator Page</h1>
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
             <h3 class="title">Fill the form below!</h3>
            <div class="addBtn">
              <a href="administrators.php">
                <span>All Admins</span>
              </a>
            </div>
           </div>
          </div>

          <?php 
            // Get the values from the database=========>
            $id = $_GET['id'];
            $sql = "SELECT * FROM admins WHERE id=$id";
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
                    header('location:' .SITEURL. 'administrators.php');
                    exit();
                }
            }
          
          ?>

          <form action="" method="POST">
                <div class="addCaseContainer flex" style="background: #b0cac15e;">
                      <div class="rowsDiv">
                        <div class="row">
                          <label for="fName">First Name</label>
                          <input type="text" id="fName"  name="firstName" value="<?php echo $fName; ?>">
                        </div>
                        <div class="row">
                          <label for="sName">Second Name</label>
                          <input type="text" id="sName"  name="secondName" value="<?php echo $sName; ?>">
                        </div>

                        <div class="row">
                          <label for="id">Employee ID No.</label>
                          <input type="text" id="id" name="atpID" value="<?php echo $eID; ?>">
                        </div>
  
                      </div>
                      <div class="rowsDiv">
                            <div class="row">
                              <label for="pass">Assign Password</label>
                              <input type="password" id="pass" name="admnPassword" value="<?php echo $password; ?>">
                            </div>
                            <div class="row">
                              <label for="roles">Assign Role</label>
                              <select id="roles"  name="adminRole" >
                                <option value="<?php echo $role; ?>" selected><?php echo $role; ?></option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                              </select>
                            </div>
                            <div class="row">
                            <input type="hidden" name="updatedID" value="<?php echo $id; ?>" readonly>
                              <input type="submit" name="submit" id="submitBtn" value="Update Admin">
                              </div>
                      </div>
                      
                    </div>
            </form>  

          <?php 
          if(isset($_POST['submit'])){
          
            $updatedID = $_POST['updatedID'];
            $firstName = $_POST['firstName'];
            $secondName = $_POST['secondName'];
            $atpID = $_POST['atpID'];
            $admnPassword = $_POST['admnPassword'];
            $adminRole = $_POST['adminRole'];

            $sql = "UPDATE admins SET
                 first_name = '$firstName',
                 second_name = '$secondName',
                 atp_id = '$atpID',
                 admin_role = '$adminRole',
                 admin_pswrd = '$admnPassword'
                 WHERE id=$updatedID
            ";

            $result = mysqli_query($conn, $sql);

            if($result == TRUE){
              $_SESSION['updateAdmin']  = '<span class="success">Administrator updated successfully!</span>';
              header('location:' .SITEURL. 'administrators.php');
              exit();
            }
            else{
              $_SESSION['updateAdmin']  = '<span class="fail">Failed to update adminstrator!</span>';
              header('location:' .SITEURL. 'administrators.php');
              exit();
            }
          
          }
          
          ?>
          
        

        </div>
      </div>
  </div>

  <?php include('partials/footer.php')?>