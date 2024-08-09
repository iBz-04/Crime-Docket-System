
<?php 
ob_start();
include('./partials/headerSection.php')
?>

  <div class="main">
  <?php include('partials/sideMenuU.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>New Incident Page</h1>
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
             <h3 class="title">Fill the fields to add a new Incident type!</h3>
             <div class="addBtn">
              <a href="incidentsU.php">
                <span>View Incidents</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <div class="addCaseContainer flex">
                <div class="rowsDiv">
                  <form action="" method="POST">
                      <div class="row">
                        <label for="incType">Incident Type</label></label>
                        <input type="text" id="incType" name="incType"  required>
                      </div>
                      
                      <div class="row">
                        <label for="incDate">Addded On</label>
                        <input type="datetime-local" id="incDate" name="incDate"  required>
                      </div>
                      

                 </div> 
                    <div class="rowsDiv">

                    <div class="row">
                        <label for="reporterName">Added By</label>
                      <input type="text" id="reporterName" name="reporterName" required>
                      </div>

                       <div class="row">
                        <input type="submit" name="submit" id="submitBtn" value="Submit Form">
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
                              $sql = "INSERT INTO incident_types SET
                                      inctype_name = '$incidentType',
                                      added_by = '$reporterName',
                                      added_on = '$incDate'
                              "; 
                              // Execute query =================>
                              $result = mysqli_query($conn, $sql);

                              // Check if query is executed ============>
                              if($result == True){
                                $_SESSION['incidentAdded'] = '<span class="success">Incident Added Successfully!</span>';
                                header('location:' .SITEURL. 'incidentsU.php');
                                exit();
                              }
                              
                              else{
                                $_SESSION['incidentAdded'] = '<span class="fail">Failed to add incident!</span>';
                                header('location:' .SITEURL. 'addIncidentU.php');
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