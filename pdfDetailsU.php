<?php 
include('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <!-- Css Link -->
  <link rel="stylesheet" href="./main.css">
     <!-- Icons Library link -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
<body>
<div class="overViewDiv" style="width: 75%; margin: 1rem auto;">
           <div class="intro flex" style="display: flex;  justify-content: space-between;" >
             <h3 class="title">Single Case PDF Details</h3>

             <div class="buttons flex" style="gap: 10px; ">

             <div class="addBtn" id="exportBtn" style="cursor: pointer;">     
            <span style="color: white;">Export PDF</span>  
            </div>
 
            <div class="addBtn" style="background: red;">
              <a href="casesU.php">
                <span>Close</span>
              </a>
            </div>
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
                $incTimeReported = $row['reported_time'];
                $reporterName = $row['reporter_name'];
                $reporterId = $row['reporter_emp_id'];
                $entrantName = $row['ob_entrant'];
                $desc = $row['incident_desc'];
                $action = $row['action_taken'];
                $category = $row['case_category'];
                $status = $row['case_status'];
                $img1 = $row['image_one'];
                $img2 = $row['image_two'];
                $img3 = $row['image_three'];

             }

        }else{
            header('location:' .SITEURL. 'cases.php');
                    exit();
        }
          }
          else{
              die('Failed to connect to the database!');
          }
          
          ?>
                    <div class="detailsContainer" id="detailsContainer" 
                    style="height: auto; width: 100%; border-radius: 0; ">
                      <div class="row" >
                      
                          <span class="rowTitle">OB Number:</span>
                          <span class="value"><?php echo $incDate;?>/<?php echo $caseId;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Incident Type:</span>
                          <span class="value"><?php echo $incidentType;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Status:</span>
                          <span class="value"><?php echo $status;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Incident Category:</span>
                          <span class="value"><?php echo $category;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Location:</span>
                          <span class="value"><?php echo $location;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Date & Time of Incident:</span>
                          <span class="value"><?php echo $incDate;?> <?php echo $incTime;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Date & Time  Reported:</span>
                          <span class="value"><?php echo $incDateReported;?> <?php echo $incTimeReported;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Reporter Name:</span>
                          <span class="value"><?php echo $reporterName;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Reporter ID:</span>
                          <span class="value"><?php echo $reporterId;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">OB Entrant:</span>
                          <span class="value"><?php echo $entrantName;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Incident Description:</span>
                          <span class="value"><?php echo $desc;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Action Taken:</span>
                          <span class="value"><?php echo $action;?></span>
                      </div>
                      <div class="row">
                          <span class="rowTitle">Attachment:</span>
                          <span class="value imageDiv flex">
                        <?php 
                        
                          if($img1!=""){   
                            ?>
                              <img src="<?php echo SITEURL;?>OB Images/ObImage<?php echo $img1;?>">

                            <?php
                          }
                          else{
                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 1</span>';
                          }

                        ?>
                        <?php 
                        
                          if($img2!=""){   
                            ?>
                              <img src="<?php echo SITEURL;?>OB Images/ObImage<?php echo $img2;?>">

                            <?php
                          }
                          else{
                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 2</span>';
                          }

                        ?>
                        <?php 
                        
                          if($img3!=""){   
                            ?>
                              <img src="<?php echo SITEURL;?>OB Images/ObImage<?php echo $img3;?>">

                            <?php
                          }
                          else{
                            echo '<span class="fail" style="color:red; margin: 0px 10px;">No Image 3</span>';
                          }

                        ?>
                        
                          </span>
                      </div>
            
            
          </div>
    
</body>
</html>
<script>
let PDFdetails = document.getElementById('detailsContainer')
let downloadBtn = document.getElementById('exportBtn')
downloadBtn.onclick = (e) => html2pdf(PDFdetails)
</script>