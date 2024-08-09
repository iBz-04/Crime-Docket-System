<?php include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenuU.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Update Follow Page</h1>
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
             <h3 class="title">Fill the fields to update follow up!</h3>
             <div class="addBtn">
              <a href="followUpU.php">
                <span>View Follow Ups</span>
              </a>
            </div>
           </div>
          </div>
          <?php 
             $follow_tableID = $_GET['id'];
            $sql = "SELECT * FROM followedup_table WHERE id=$follow_tableID";
            $res = mysqli_query($conn, $sql);
            if($res== TRUE){
                $count = mysqli_num_rows($res);
                if($count ==1){

                    while($row = mysqli_fetch_assoc($res)){
                        $fObNumber  = $row['ob_number'];   
                        $fincidetType  = $row['incident_type'];   
                        $dateTime  = $row['date_time'];   
                        $fIncidentDate  = $row['incident_date'];   
                        $ffollowerName  = $row['follower_name'];   
                        $caseDesc  = $row['case_desc'];   
                        $fActionTaken  = $row['action_taken'];   
                        $caseStatus  = $row['case_status'];   
                    }
                }
            }
            else{
                die('Failed To Connect To The Database!');
            }
          ?>


          <div class="mainItems">
            <div class="addCaseContainer flex">

           
                
                <div class="rowsDiv">
                  <h1 class="followUpTitle">
                    Update Follow Up Form
                  </h1>
                  <form action="" method="POST">
                  <div class="row">
                    <label for="obnumber">OB Number</label></label>
                   
                    <input type="text" id="obnumber" name="fObNumber" readonly value="<?php echo $fIncidentDate;?>/<?php echo $fObNumber?>">
                    <input type="hidden" value="<?php echo $fObNumber?>" name="ob_number">
                    

                   </div>
                  <div class="row">
                    <label for="incType">Incident Type</label></label>
                 
                    <input type="text" name="incType" id="incType" readonly value="<?php echo $fincidetType;?>">

                   </div>
                   
                   <div class="row">
                    <label for="incDate">Date/Time of Update</label>
                    <input type="datetime-local" name="incDate" id="incDate"  required>
                   </div>

                   <div class="row">
                    <label for="followerName">Followed Up By</label>
                   <input type="text" name="followerName" id="followerName"  value="<?php echo $ffollowerName?>" required>
                   </div>

                   <div class="row">
                    <label for="desc">Description</label>
                    <textarea name="follow_desc" id="desc"  required ><?php echo $caseDesc?>
                    </textarea>
                   </div>

                </div>
                <div class="rowsDiv" style="margin-top: 6rem;">

                   <div class="row">
                    <label for="desc2">Action Taken</label>
                    <textarea name="action_taken" id="desc2"  required ><?php echo $fActionTaken?>
                    </textarea>
                   </div>

                   <div class="row">
                    <label for="status">Status</label>
                    <select name="case_status" id="status">
                      <option value="<?php echo $caseStatus?>"><?php echo $caseStatus?></option>
                      <option value="Open">Case Open</option>
                      <option value="Closed">Case Closed</option>
                    </select>
                   </div>
                   
                   <div class="row">
                   <input type="submit" name="submit" id="submitBtn" value="Update Follow Up">
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
    $incId = $_POST['ob_number'];
    $incidetType2 = $_POST['incType'];
    $followupDate = $_POST['incDate']; 
    $followerName = $_POST['followerName']; 
    $followDesc = $_POST['follow_desc']; 
    $actionTaken = $_POST['action_taken']; 
    $currentStatus = $_POST['case_status']; 


    $sql = "UPDATE followedup_table SET
             ob_number  = '$incId',
             incident_type  = '$incidetType2',
             date_time  = '$followupDate',
             follower_name  = '$followerName',
             case_desc  = '$followDesc',
             action_taken  = '$actionTaken',
             case_status  = '$currentStatus'
             WHERE id=$follow_tableID

    ";
    $result = mysqli_query($conn, $sql);
    if($result == TRUE){
      $_SESSION['follow'] = '<span class="success"> Followed Up Updated Successfully!</span>';
      header('location:'.SITEURL. 'followUpU.php');
      exit();
    }
    else{

      die("Failed to connect to the database!");
    }
  }
  ?>