<?php 
include('partials/headerSection.php');
ob_start();
?>


  <div class="main">
      <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Add Administrator Page</h1>
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

          <form action="" method="POST">
                <div class="addCaseContainer flex" style="background: #b0cac15e;">
                      <div class="rowsDiv">
                        <div class="row">
                          <label for="fName">First Name</label>
                          <input type="text" id="fName"  name="firstName" required>
                        </div>
                        <div class="row">
                          <label for="sName">Second Name</label>
                          <input type="text" id="sName"  name="secondName" required>
                        </div>

                        <div class="row">
                          <label for="id">Employee ID No.</label>
                          <input type="text" id="id" name="atpID" required >
                        </div>
  
                      </div>
                      <div class="rowsDiv">
                            <div class="row">
                              <label for="pass">Assign Password</label>
                              <input type="password" id="pass" name="admnPassword" required>
                            </div>
                            <div class="row">
                              <label for="roles">Assign Role</label>
                              <select id="roles" name="adminRole">
                                <option value="Admin">Administrator</option>
                                <option value="Editor" selected>Editor</option>
                              </select>
                            </div>
                            <div class="row">
                             
                              <input type="submit" name="submit" id="submitBtn" value="Add Admin">
                              </div>
                      </div>
                      
                    </div>
            </form>  

          <?php 
          if(isset($_POST['submit'])){
          
            $firstName = $_POST['firstName'];
            $secondName = $_POST['secondName'];
            $atpID = $_POST['atpID'];
            $admnPassword = $_POST['admnPassword'];
            $adminRole = $_POST['adminRole'];

            $sql = "INSERT INTO admins SET
                 first_name = '$firstName',
                 second_name = '$secondName',
                 atp_id = '$atpID',
                 admin_role = '$adminRole',
                 admin_pswrd = '$admnPassword'
            ";

            $result = mysqli_query($conn, $sql);

            if($result == TRUE){
              $_SESSION['adminAdded']  = '<span class="success">Administrator added successfully!</span>';
              header('location:' .SITEURL. 'administrators.php');
              exit();
            }
            else{
              $_SESSION['adminAdded']  = '<span class="fail">Failed to adminstrator!</span>';
              header('location:' .SITEURL. 'addAdmin.php');
              exit();
            }
          
          }
          
          ?>
          
        

        </div>
      </div>
  </div>

  <?php include('partials/footer.php')?>