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
  'Image One', 'Image Two', 'Image Three', 'FollowUp ID', 'OB NUmber', 'Incident Type', 
  'FollowUp Date/Time', 'Incident Date', 'Follower Name',
   'Case description', 'Action Taken', 'Case Status']
];


$sql = "SELECT * FROM cases_table";
$res = mysqli_query($conn, $sql);
if($res  == TRUE){
                 
  $count = mysqli_num_rows($res);
  if($count>0){
          while($row = mysqli_fetch_assoc($res)){
          $cases = array_merge($cases, array(array($row['id'], 
          $row['incident_type'],
          $row['location'],
          $row['incident_date'],
          $row['incident_time'],
          $row['reported_date'],
          $row['reported_time'],
          $row['reporter_name'],
          $row['reporter_emp_id'],
          $row['ob_entrant'],
          $row['incident_desc'],
          $row['action_taken'],
          $row['case_category'],
          $row['case_status'],
          $row['image_one'],
          $row['image_two'],
          $row['image_three'],
         
        
        
        )));
          }  
  }
}

// $f = [
//   [ 'FollowUp ID', 'OB NUmber', 'Incident Type', 
//   'FollowUp Date/Time', 'Incident Date', 'Follower Name',
//    'Case description', 'Action Taken', 'Case Status']
// ];
// $sql2 = "SELECT * FROM followedup_table";
// $res2 = mysqli_query($conn, $sql2);
// if($res2  == TRUE){
                 
//   $count = mysqli_num_rows($res2);
//   if($count>0){
//           while($row = mysqli_fetch_assoc($res2)){
//           $f = array_merge($f, array(array(
//           $row['id'],
//           $row['ob_number'],
//           $row['incident_type'],
//           $row['date_time'],
//           $row['incident_date'],
//           $row['follower_name'],
//           $row['case_desc'],
//           $row['action_taken'],
//           $row['case_status'],
        
        
//         )));
//           }  
//   }
// }

// $xlsx = ob\SimpleXLSXGen::fromArray( $f );
$xlsx = ob\SimpleXLSXGen::fromArray( $cases );
$xlsx->downloadAs('cases.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server


?>


