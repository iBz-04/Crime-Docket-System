<?php include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>New Case Page</h1>
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
             <h3 class="title">Fill the fields to add a new case!</h3>
            
             <div class="addBtn">
              <a href="cases.php">
                <span>View Cases</span>
              </a>
            </div>
           </div>
          </div>

        <?php 
        //   Get individaul case id====>
        $caseId = $_GET['id'];
          $sql = "SELECT * FROM cases_table WHERE id=$caseId";
          $res = mysqli_query($conn, $sql);
          if($res == TRUE){
        $count = mysqli_num_rows($res);
        if($count == 1){
             while($row = mysqli_fetch_assoc($res)){
                $incidentType = $row['incident_type'];
                $location = $row['location'];
                $incDate = $row['incident_date'];
                $incTime = $row['incident_time'];
                $incDateReported = $row['reported_date'];
                $reporterName = $row['reporter_name'];
                $reporterId = $row['reporter_emp_id'];
                $entrantName = $row['ob_entrant'];
                $desc = $row['incident_desc'];
                $action = $row['action_taken'];
                $category = $row['case_category'];
                $status = $row['case_status'];

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
            <div class="mainItems">
            <div class="addCaseContainer flex">

              <div class="rowsDiv">
              <form action="" method="POST" enctype="multipart/form-data">   

                <div class="row">
                    <label for="incType">Incident Type</label></label>
                   
                    <select name="incType" id="incType" required>
                    <option value="<?php echo  $incidentType; ?>"><?php echo  $incidentType; ?> </option>
                    <?php 
                    
                    $sql = "SELECT * FROM incident_types";
                    $res2 = mysqli_query($conn, $sql);
                    if($res2 == TRUE){
                         $count = mysqli_num_rows($res2);
                         echo $count;
                         if($count > 0){
                           while($row = mysqli_fetch_assoc($res2)){
                             $typeName = $row['inctype_name'];
                             echo $typeName;

                             ?>

                 
                       <option value="<?php echo $typeName; ?>"><?php echo $typeName; ?></option>
                             <?php
                           }
                         }
                    }
                    else{
                      die('Failed to connect to the database');
                    }
                    
                    ?>
                    </select>
                   </div>
                   <div class="row">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location"  value="<?php echo  $location; ?>" required>
                   </div>
                   <div class="row">
                    <label for="incDate">Date of Incident</label>
                    <input type="date" name="incDate" id="incDate" value="<?php echo  $incDate; ?>" required>
                   </div>
                   <div class="row">
                    <label for="incTime">Time of Incident</label>
                    <input type="time" name="incTime" id="incTime" value="<?php echo  $incTime; ?>" required>
                   </div>
                   <div class="row">
                    <label for="incDateReported">Date Reported</label>
                    <input type="date" name="incDateReported" id="incDateReported"  value="<?php echo  $incDateReported; ?>" required>
                   </div>
                   <div class="row">
                    <label for="reportTime">Time Reported</label>
                    <input type="time" name="reportTime" id="reportTime"  required>
                   </div>

                   <div class="row">
                    <label for="reporterName">Reported By</label>
                   <input type="text" name="reporterName" id="reporterName"  value="<?php echo  $reporterName; ?>" required>
                   </div>

                   <div class="row">
                    <label for="reporterID">Reporter ID</label>
                   <input type="number" name="atpID" id="reporterID"  value="<?php echo  $reporterId; ?>" required>
                   </div>

                   <div class="row">
                    <label for="entrantName">OB Entry by</label>
                   <input type="text" name="entrantName" id="entrantName"  value="<?php echo  $entrantName; ?>" required>
                   </div>
                  

                   <div class="row">
                    <label for="desc">Incident Description</label>
                    <textarea name="desc" id="desc" required ><?php echo $desc; ?>
                    </textarea>
                   </div>
 
                </div>
                <div class="rowsDiv">

                   <div class="row">
                    <label for="desc2">Action taken</label>
                    <textarea name="action" id="desc2" required ><?php echo $action; ?>
                    </textarea>
                   </div>
                   
                   <div class="row">
                    <label for="file1">Select Image (1)</label>
                    <input type="file" name="image1" id="file1"  placeholder="Select file (images)" style="cursor: pointer;" >
                   </div>
                 
                   <div class="row">
                    <label for="file2">Select Image (2)</label>
                    <input type="file" name="image2" id="file2" placeholder="Select file (images)" style="cursor: pointer;">
                   </div>
                   <div class="row">
                    <label for="file3">Select Image (3)</label>
                    <input type="file" name="image3" id="file3" placeholder="Select file (images)" style="cursor: pointer;">
                   </div>
                   <div class="row">
                    <label for="category">Incident Category</label>
                    <select name="category" id="category" required>
                      <option value="<?php echo  $category; ?>"><?php echo  $category; ?></option>
                      <option value="Minor">Minor Incident</option>
                      <option value="Modorate">Modorate Incident</option>
                      <option value="Major">Major Incident</option>
                    </select>
                   </div>
                   
                   <div class="row" >
                    <label class="container" id="status">Status
                    <input type="checkbox" name="status" value="<?php echo $status?>">
                    <span class="checkmark"></span>
                     </label>
                   </div>
                
                  
                   <div class="row">
                   <input type="hidden" name="updateID"  value="<?php echo $caseId ?>">
                    <input type="submit" name="submit" id="submitBtn" value="Update Case">
                    </div>
                  
                 
                </div>
               
                
              </div>
            </form> 

          </div>
          
        

        </div>
      </div>
  </div>

  <?php include('partials/footer.php')?>



  <?php 

$incDateVariable = "";
$inc_reported_Date_Variable = "";

if(isset($_POST['submit'])){


// get input through variables
 $incidentType = $_POST['incType'];
 $location = $_POST['location'];
 $incTime = $_POST['incTime'];
 $reportTime = $_POST['reportTime'];
 $reporterName = $_POST['reporterName'];
 $reporterId = $_POST['atpID'];
 $entrantName = $_POST['entrantName'];
 $desc = $_POST['desc'];
 $category = $_POST['category'];
 $status = $_POST['status'];
 $action = $_POST['action'];
 if($status == "" ){
  $status = 'Open';
}


// Format dates to dd/mm/yyyy ===================>
 
  $incDateVariable = $_POST['incDate'];
  $dateResult = explode('-',$incDateVariable);
  $date = $dateResult['2'];
  $month = $dateResult['1'];
  $year = $dateResult['0'];
  $incDate = $date.'/'.$month.'/'.$year;

  $inc_reported_Date_Variable = $_POST['incDateReported'];
  $dateResult = explode('-',$inc_reported_Date_Variable);
  $report_date = $dateResult['2'];
  $report_month = $dateResult['1'];
  $report_year = $dateResult['0'];
  $incDateReported = $report_date.'/'.$report_month.'/'.$report_year;


//  Uploading Image 1 to the database =======================>
 
 if(isset($_FILES['image1']['name'])){
  //To upload the image we need the image name, source and destination.
  $image1 = $_FILES['image1']['name'];
  // Source ================>
  $image1Source = $_FILES['image1']['tmp_name'];
  // Destination ================>
  $image1Destination = "./OB Images/ObImage".$image1; 
  // Finally upload the image ========>
  $uploadInage1 = move_uploaded_file($image1Source, $image1Destination);

  if($uploadInage1 == false){
    $_SESSION['imgUpload']  = '<span class="fail">Failed to upload image!</span>';
          header('location:' .SITEURL. 'addCase.php');
          
          
  }
}else{
  
  $image1 ="";
  }


//  Uploading Image 2 to the database =======================>
if(isset($_FILES['image2']['name'])){
  // Get Image name ====>
  $image2 = $_FILES['image2']['name'];
  // Get Image source ====>
  $image2Source = $_FILES['image2']['tmp_name'];
  // Set Image destination ====>
  $image2Destination = "./OB Images/ObImage".$image2;
  // Upload image to the database ====>
  $uploadImage2 = move_uploaded_file($image2Source, $image2Destination);

  if($uploadImage2 == FALSE){
    $_SESSION['imgUplaod']  = '<span class="fail">Rem!</span>';
    header('location:' .SITEURL. 'addCase.php');   
   
  }

}else{
  $image2 = "";
}


//  Uploading Image 3 to the database =======================>

if(isset($_FILES['image3']['name'])){
  // Get image name =======>
  $image3 = $_FILES['image3']['name'];
  // Get image Source =======>
  $image3Source = $_FILES['image3']['tmp_name'];
  // Set image Destination =======>
  $image3Destination = "./OB Images/ObImage".$image3;
  // Upload image to the database =======>
  $uploadImage3 = move_uploaded_file($image3Source, $image3Destination);

  if($uploadImage3 == false){
    $_SESSION['imgUplaod']  = '<span class="fail">Failed to upload image!</span>';
    header('location:' .SITEURL. 'addCase.php');

    
  }
}
else{
  $image3 = "";
}


 $sql = "UPDATE cases_table SET
         incident_type = '$incidentType',
         location = '$location',
         incident_date = '$incDate',      
         incident_time = '$incTime',
         reported_date = '$incDateReported',
         reported_time = '$reportTime',
         reporter_name = '$reporterName',
         reporter_emp_id = '$reporterId',
         ob_entrant = '$entrantName',
         incident_desc = '$desc',
         action_taken = '$action',
         case_category = '$category',
         case_status = '$status',
         image_one = '$image1',
         image_two = '$image2',
         image_three = '$image3'
         WHERE id=$caseId
 
 
  ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE){
  $_SESSION['updatedCase'] = '<span class="success">Case Updated Successfully!</span>';
  header('location:'.SITEURL. 'cases.php');
  exit();

 }
 else{
    
die('Failed to connect to database!');
 }

}
?>