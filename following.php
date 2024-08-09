<?php include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>New Case Follow Page</h1>
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
             <h3 class="title">Fill the fields to add a new case follow up!</h3>
             <div class="addBtn">
              <a href="followUp.php">
                <span>View Follow Ups</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <div class="addCaseContainer flex">

             <?php 
            //  Get case ID====>
            $caseId = $_GET['id'];
            $sql = "SELECT * FROM cases_table WHERE id=$caseId";
            $res = mysqli_query($conn, $sql);
            if($res == TRUE){
              if(mysqli_num_rows($res)==1){

                while($row = mysqli_fetch_assoc($res)){
                  $incidetType = $row['incident_type'];
                  $ID = $row['id'];
                  $caseStatus = $row['case_status'];
                  $reportedDate = $row['reported_date'];
                  $incidentDate = $row['incident_date'];
                }
              }

            }
            else{
              die('Failed to connect to the database!');
            }
             
             ?>
              
                
                <div class="rowsDiv">
                  <h1 class="followUpTitle">
                    Follow Up Form
                  </h1>
                  <form action="" method="POST">
                  <div class="row">
                    <label for="obnumber">OB Number</label></label>
                   
                    <input type="text" id="obnumber" readonly value="<?php echo $reportedDate;?>/<?php echo $ID?>">
                    <input type="hidden" name="obNumber" value="<?php echo $ID;?>">
                    <input type="hidden" name="incidentDate" value="<?php echo $incidentDate;?>">

                   </div>
                  <div class="row">
                    <label for="incType">Incident Type</label></label>
                 
                    <input type="text" name="incType" id="incType" readonly value="<?php echo $incidetType;?>">

                   </div>
                   
                   <div class="row">
                    <label for="incDate">Date/Time of Follow Up</label>
                    <input type="datetime-local" name="incDate" id="incDate"  required>
                   </div>

                   <div class="row">
                    <label for="followerName">Followed Up By</label>
                   <input type="text" name="followerName" id="followerName" required>
                   </div>

                   <div class="row">
                    <label for="desc">Description</label>
                    <textarea name="follow_desc" id="desc"  required >
                    </textarea>
                   </div>

                </div>
                <div class="rowsDiv" style="margin-top: 6rem;">

                   <div class="row">
                    <label for="desc2">Action Taken</label>
                    <textarea name="action_taken" id="desc2"  required >
                    </textarea>
                   </div>

                   <div class="row">
                    <label for="status">Status</label>
                    <select name="case_status" id="status">
                      <option value="<?php echo $caseStatus; ?>"><?php echo $caseStatus; ?></option>
                      <option value="Open">Case Open</option>
                      <option value="Closed">Case Closed</option>
                    </select>
                   </div>
                   
                   <div class="row">
                   <input type="submit" name="submit" id="submitBtn" value="Submit Form">
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
    // <!-- Declare variables -->
    $incId = $_POST['obNumber'];
    $incidetType2 = $_POST['incType'];
    $followupDate = $_POST['incDate']; 
    $incidentDate = $_POST['incidentDate']; 
    $followerName = $_POST['followerName']; 
    $followDesc = $_POST['follow_desc']; 
    $actionTaken = $_POST['action_taken']; 
    $currentStatus = $_POST['case_status']; 

    


    $sql3 = "INSERT INTO followedup_table SET
             ob_number  = '$incId',
             incident_type  = '$incidetType2',
             date_time  = '$followupDate',
             incident_date  = '$incidentDate',
             follower_name  = '$followerName',
             case_desc  = '$followDesc',
             action_taken  = '$actionTaken',
             case_status  = '$currentStatus'

    ";
    $result = mysqli_query($conn, $sql3);
    
    if($result == TRUE){
      $sql1 = "UPDATE cases_table SET
      case_status = '$currentStatus'
      WHERE id = $caseId

      ";
      $result1 = mysqli_query($conn, $sql1);

      $_SESSION['follow'] = '<span class="success">Case Followed Up Successfully!</span>';
      header('location:'.SITEURL. 'followUp.php');
      exit();
    }
    else{

      die("Failed to connect to the database!");
    }
  }
  ?>