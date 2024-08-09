
<?php include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenuU.php')?>

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
             <?php 
                   

                     if(isset($_SESSION['addedCase'])){
                      echo $_SESSION['addedCase'];
                      unset($_SESSION['addedCase']);
                    }
                                    
                   ?>
             <div class="addBtn">
              <a href="casesU.php">
                <span>View Cases</span>
              </a>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <div class="addCaseContainer flex">

              <div class="rowsDiv">
              <form action="" method="POST" enctype="multipart/form-data">   

                <div class="row">
                    <label for="incType">Incident Type</label></label>
                   
                    <select name="incType" id="incType" required>
                    <option value="Not Mentioned"> </option>
                    <?php 
                    
                    $sql = "SELECT * FROM incident_types";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                         $count = mysqli_num_rows($res);
                         echo $count;
                         if($count > 0){
                           while($row = mysqli_fetch_assoc($res)){
                            
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
                    <input type="text" name="location" id="location"  required>
                   </div>
                   <div class="row">
                    <label for="incDate">Date of Incident</label>
                    <input type="date" name="incDate" id="incDate"  required>
                   </div>
                   <div class="row">
                    <label for="incTime">Time of Incident</label>
                    <input type="time" name="incTime" id="incTime"  required>
                   </div>
                   <div class="row">
                    <label for="incDateReported">Date Reported</label>
                    <input type="date" name="incDateReported" id="incDateReported"  required>
                   </div>
                   <div class="row">
                    <label for="reportTime">Time Reported</label>
                    <input type="time" name="reportTime" id="reportTime"  required>
                   </div>

                   <div class="row">
                    <label for="reporterName">Reported By</label>
                   <input type="text" name="reporterName" id="reporterName"  required>
                   </div>

                   <div class="row">
                    <label for="reporterID">Reporter ID</label>
                   <input type="number" name="atpID" id="reporterID"  required>
                   </div>

                   <div class="row">
                    <label for="entrantName">OB Entry by</label>
                   <input type="text" name="entrantName" id="entrantName"  required>
                   </div>
                  

                   <div class="row">
                    <label for="desc">Incident Description</label>
                    <textarea name="desc" id="desc"  required >
                    </textarea>
                   </div>
 
                </div>
                <div class="rowsDiv">

                   <div class="row">
                    <label for="desc2">Action taken</label>
                    <textarea name="action" id="desc2"  required >
                    </textarea>
                   </div>
                   
                   <div class="roww">
                    <label for="file1">Select Image (1)</label>
                    <input type="file" name="image1" id="file1"  placeholder="Select file (images)" style="cursor: pointer;" >
                   </div>
                 
                   <div class="select_row">
                    <label for="file2">Select Image (2)</label>
                    <input type="file" name="image2" id="file2" placeholder="Select file (images)" style="cursor: pointer;">
                   </div>
                   <div class="select_row">
                    <label for="file3">Select Image (3)</label>
                    <input type="file" name="image3" id="file3" placeholder="Select file (images)" style="cursor: pointer;">
                   </div>
                   <div class="row">
                    <label for="category">Incident Category</label>
                    <select name="category" id="category" required>
                      <option value="Not Mentioned">--Select Below--</option>
                      <option value="Minor">Minor Incident</option>
                      <option value="Modorate">Modorate Incident</option>
                      <option value="Major">Major Incident</option>
                    </select>
                   </div>
                   
                    <div class="row">
                    <!-- <label for="status">Status</label>
                    <input type="checkbox" value="Closed" name="status" id="status" />
                    -->
                    <label class="container" id="status">Status
                    <input type="checkbox" name="status" value="Closed">
                    <span class="checkmark"></span>
                  </label>
                   </div>
                
                  
                   <div class="row">
               
                    <input type="submit" name="submit" id="submitBtn" value="Submit Form">
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
    //  $incidentID = $_POST['incID'];
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

    }


     $sql = "INSERT INTO cases_table SET
    
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

     
     
      ";

     $result = mysqli_query($conn, $sql);

     if($result == TRUE){
      $_SESSION['addedCase'] = '<span class="success">Case added Successfully!</span>';
      header('location:'.SITEURL. 'addCaseU.php');
      exit();

     }
     else{
        
    die('Failed to connect to database!');
     }

  }

  ?>