
<?php 
ob_start();
include('./partials/headerSection.php')
?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Update Incident Page</h1>
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
             <h3 class="title">Fill the fields to update current Incident!</h3>
             <div class="addBtn">
              <a href="incidentTypes.php">
                <span>View Incidents</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <div class="addCaseContainer flex">
                <div class="rowsDiv">
                   
                <?php
                
                // Get the id================>
                $incidentId = $_GET['id'];

                $sql = "SELECT * FROM incident_types WHERE id=$incidentId";
                $res = mysqli_query($conn, $sql);
                if($res==true){
                    $count = mysqli_num_rows($res);
                    if($count == 1){
                        while($row = mysqli_fetch_assoc($res)){
                             $incidentType = $row['inctype_name'];
                             $updatedDate = $row['added_on'];
                             $updatedBy = $row['added_by'];
                             $adminPassword = $row['admin_password'];

                        }
                    }
                    else{
                        header('location:' .SITERURL. 'incidentTypes.php');
                        exit();
                    }
                }
                
                ?>

                  <form action="" method="POST">
                      <div class="row">
                        <label for="incType">Incident Type</label></label>
                        <input type="text" id="incType" name="incType" value="<?php echo $incidentType ?>">
                      </div>
                      
                      <div class="row">
                        <label for="incDate">Updated On</label>
                        <input type="datetime-local" id="incDate" name="incDate" value="<?php echo $updatedDate ?>">
                      </div>
                     

                

                 </div>
                    <div class="rowsDiv">
                    <div class="row">
                        <label for="reporterName">Updated By</label>
                      <input type="text" id="reporterName" name="reporterName" value="<?php echo $updatedBy ?>">
                      </div>
 
                      <div class="row">
                          <input type="hidden" name="updateID"  value="<?php echo $incidentId ?>">
                        <input type="submit" name="submit" id="submitBtn" value="Update">
                        </div>       
                   </div>
              
                </form>

                          <?php 
                            
                            if(isset($_POST['submit'])){

                              // Create input variables============>
                              $incidentType = $_POST['incType'];
                              $reporterName = $_POST['reporterName'];
                              $incDate = $_POST['incDate'];

                              // Insert Data to the table ===============>
                              $sql = "UPDATE incident_types SET
                                      inctype_name = '$incidentType',
                                      added_by = '$reporterName',
                                      added_on = '$incDate'
                                      WHERE id=$incidentId
                              "; 
                              // Execute query =================>
                              $result = mysqli_query($conn, $sql);

                              // Check if query is executed ============>
                              if($result == True){
                                $_SESSION['updateIncident'] = '<span class="success">Incident Updated Successfully!</span>';
                                header('location:' .SITEURL. 'incidentTypes.php');
                                exit();
                              }
                              
                              else{
                                $_SESSION['updateIncident'] = '<span class="fail">Failed to update incident!</span>';
                                header('location:' .SITEURL. 'incidentTypes.php');
                                exit();
                              }
                            }
                            
                          ?>
                </div>
                
            </div>
          </div>
          
        

        </div>
      </div>
  </div>

 

  <?php include('partials/footer.php')?>