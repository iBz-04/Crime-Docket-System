<?php

// Include Database connection
include("config/config.php");
// Include SimpleXLSXGen library
include("SimpleXLSXGen.php");

$followUps = [
  ['OB Number', 'Incident Type', 'Incident Date', 
  'Follow Up Date/Time', 'Follow Name', 'Case Description', 'Action Taken', 'Case Status']
];

                $sql = "SELECT * FROM followedup_table";
                $res = mysqli_query($conn, $sql);

                if($res  == TRUE){

                     ?>
                    $image1 = <img src="<?php echo SITEURL;?>OB Images/ObImage<?php echo $img1;?>">
                    <?php
                 
                $count = mysqli_num_rows($res);
                if($count>0){
                        while($row = mysqli_fetch_assoc($res)){
                        $followUps = array_merge($followUps, array(array($row['ob_number'], 
                        $row['incident_type'], $row['date_time'], $row['incident_date'], $row['follower_name'], 
                        $row['case_desc'], $row['action_taken'], $row['case_status'])));
                        }  
                }
            }


$xlsx = SimpleXLSXGen::fromArray($followUps);
$xlsx->downloadAs('followUps.xlsx');

