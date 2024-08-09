<?php include('partials/headerSection.php');
error_reporting(0);
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
        <div class="dashboardTitle">
            <h1>Administrators Page</h1>
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
             <h3 class="title">Administrators</h3>
             <?php 
             
                  if(isset($_SESSION['adminAdded'])){
                    echo $_SESSION['adminAdded'];
                    unset ($_SESSION['adminAdded']);
                  }

                  if(isset($_SESSION['admins'])){
                    echo $_SESSION['admins'];
                    unset ($_SESSION['admins']);
                  }

                  if(isset($_SESSION['deleteAdmin'])){
                    echo $_SESSION['deleteAdmin'];
                    unset ($_SESSION['deleteAdmin']);
                  }

                  if(isset($_SESSION['updateAdmin'])){
                    echo $_SESSION['updateAdmin'];
                    unset ($_SESSION['updateAdmin']);
                  }
               
              ?>


            <div class="addBtn">
              <a href="addAdmin.php">
                <span>Add Admin</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <table>
           
                <tr  class="tableHeader">
                  <th>Databse ID</th>
                  <th>First Name</th>
                  <th>Second Name</th>
                  <th>ATP ID</th>
                  <th>Roles</th>
                  <th>Password</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  </tr>

                  <?php 
                        $sql = "SELECT * FROM admins";

                        $result = mysqli_query($conn, $sql);
                        if($result == TRUE){
                            if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                   $dbID = $row['id'];
                                   $firstName = $row['first_name'];
                                   $secName = $row['second_name'];
                                   $atpId = $row['atp_id'];
                                   $admin_role = $row['admin_role'];
                                   $admin_password = $row['admin_pswrd'];

                                   ?>

                                        <tr class="tableData"> 
                                          <td><?php echo $dbID;?></td>
                                          <td><?php echo $firstName;?></td>
                                          <td><?php echo $secName;?></td>
                                          <td><?php echo $atpId;?></td>
                                          <td><?php echo $admin_role;?></td>
                                          <td><?php echo $admin_password;?></td>
                                          <td><a href="<?php echo SITEURL ?>updateAdmin.php?id=<?php echo $dbID; ?>"><i class="uil uil-edit icon editIcon"></i></a></td>
                                          <td> <a href="<?php echo SITEURL ?>deleteAdmin.php?id= <?php echo $dbID;?>"><i class="uil uil-times-square icon deleteIcon"></i></a></td>
                                        </tr>


                                   <?php
                              }
                            }

                            else{
                              $_SESSION['admins'] = '<span class="fail"> No single amdministrator!</span>';
                              header('location:' . SITEURL. 'administrators.php');
                              exit();
                            }
                        }

                        else{
                          die('Connection Failed');
                        }

                  ?>
            </table>
          </div>

        </div>
      </div>
  </div>

<?php include('partials/footer.php')?>