<?php

// Include Database connection
include("config/config.php");
// Include SimpleXLSXGen library
include("SimpleXLSXGen.php");

$cases = [
  ['Case Id', 'Incident Type', 'Location', 'Incident Date', 
  'Incident Time', 'Reported Date', 'Reported Time', 'Reporter Name', 'Reporter Emp ID', 
  'OB Entarant', 
  'Incident Description', 'Action Taken', 'Category', 'Status',
  'Image One', 'Image Two', 'Image Three']
];

                $sql = "SELECT * FROM cases_table";
                $res = mysqli_query($conn, $sql);

                if($res  == TRUE){
                

                     ?>
                    $image1 = <img src="<?php echo SITEURL;?>OB Images/ObImage<?php echo $img1;?>">
                    <?php
                 
                $count = mysqli_num_rows($res);
                if($count>0){
                        while($row = mysqli_fetch_assoc($res)){
                        $cases = array_merge($cases, array(array($row['id'], $row['incident_type'], 
                        $row['location'], $row['incident_date'], $row['incident_time'], $row['reported_date'], 
                        $row['reported_time'], $row['reporter_name'], $row['reporter_emp_id'], 
                        $row['ob_entrant'], $row['incident_desc'], $row['action_taken'], $row['case_category'],
                        $row['case_status'], 
                        $image1, $row['image_two'], $row['image_three'])));
                        }  
                }
            }


$xlsx = SimpleXLSXGen::fromArray($cases);
$xlsx->downloadAs('cases.xlsx');

