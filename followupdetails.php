<?php include('partials/headerSection.php')?>

  <div class="main">
    <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Follow Up Details Page</h1>
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
             <h3 class="title">Single Case Details</h3>
            <div class="addBtn">
              <a href="followUp.php">
                <span>Close</span>
              </a>
            </div>
           </div>
          </div>
          <?php 
        //   Get individaul case id====>
        $caseId = $_GET['id'];
          $sql = "SELECT * FROM followedup_table WHERE id=$caseId";
          $res = mysqli_query($conn, $sql);
          if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count == 1){
             while($row = mysqli_fetch_assoc($res)){
                $incidentType = $row['incident_type'];
                $currentStatus = $row['case_status'];
                $obNumber = $row['ob_number'];
                $dateTime = $row['date_time'];
                $incidentDate = $row['incident_date'];
                $follower = $row['follower_name'];
                $caseDesc = $row['case_desc'];
                $actionTaken = $row['action_taken'];

             }

        }else{
            header('location:' .SITEURL. 'cases.php');
                    exit();
        }
          }
          else{
              die('Failed to connect to nthe database!');
          }
          
          ?>
                 <div class="detailsContainer">
            <div class="row">
                <span class="rowTitle">OB Number:</span>
                <span class="value"><?php echo $incidentDate;?>/<?php echo $obNumber;?></span>
            </div>
            <div class="row">
                <span class="rowTitle">Incident Type:</span>
                <span class="value"><?php echo $incidentType;?></span>
            </div>
            <div class="row">
                <span class="rowTitle">Current Status:</span>
                <span class="value"><?php echo $currentStatus;?></span>
            </div>
            
            <div class="row">
                <span class="rowTitle">Date & Time of Follow Up:</span>
                <span class="value"><?php echo $dateTime;?></span>
            </div>
            
            <div class="row">
                <span class="rowTitle">Follower Name:</span>
                <span class="value"><?php echo $follower;?></span>
            </div>
           
            <div class="row">
                <span class="rowTitle">Incident Description:</span>
                <span class="value"><?php echo $caseDesc;?></span>
            </div>
            <div class="row">
                <span class="rowTitle">Action Taken:</span>
                <span class="value"><?php echo $actionTaken;?></span>
            </div>

            
          </div>


        </div>
      </div>
  </div>



<?php include('partials/footer.php')?>