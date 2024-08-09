<?php 
include('partials/headerSection.php');

?>

  <div class="main">
  <?php include('partials/sideMenuU.php')?>

      <div class="mainContent">
        <div class="topSection flex">
        <div class="dashboardTitle">
            <h1>Follow Ups Page</h1>
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
              <h3 class="title">Followed Up Cases</h3>
              <?php 
            
            if(isset($_SESSION['follow'])){
              echo $_SESSION['follow'];
              unset ($_SESSION['follow']);
            }

            ?>
              <div class="buttons flex" style="gap: 10px;">
                <div class="addBtn">
                  <a href="casesU.php">
                    <span>Follow New Case</span>
                  </a>
                </div>
                 <div class="addBtn excelBtn" >
                 <a href="<?php SITEURL?>exportCases.php">
                    <span>Export Excel</span>
                  </a>
                </div>
                <div class="addBtn">
                <a href="searcFollowupU.php">
                  <span>Search</span>
                </a>
              </div>
              </div>
            
            </div>
           </div>

           <?php 
           
           
           
           ?>
           <div class="mainItems">
            <table>
           
                <tr  class="tableHeader">
                  <th>OB No.</th>
                  <th>Incident Type</th>
                  <th>Date/Time(Followed Up)</th>
                  <th>Followed By</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Details</th>
                </tr>

                <?php 

                $sql = "SELECT * FROM followedup_table";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE){
                  $count = mysqli_num_rows($res);
                  if($count>0){
                      while($row = mysqli_fetch_assoc($res)){
                          $id = $row['id'];
                          $incType = $row['incident_type'];
                          $obNumber = $row['incident_date'];
                          $obID = $row['ob_number'];
                          $dateTime = $row['date_time'];
                          $followerName = $row['follower_name'];
                          $status = $row['case_status'];

                           ?>
                            <tr class="tableData">
                                <td><?php echo $obNumber;?>/<?php echo $obID;?></td>
                                <td><?php echo $incType;?></td>
                                <td><?php echo $dateTime;?></td>
                                <td><?php echo $followerName;?></td>
                                <td><?php echo $status;?></td>
                               
                             
                                <td><a href="<?php echo SITEURL?>updatefollowupU.php?id= <?php echo $id;?>"><i class="uil uil-edit icon editIcon"></i></a></td>
                             
                                <td><a href="<?php echo SITEURL?>followupdetailsU.php?id= <?php echo $id;?>"><i class="uil uil-file-info-alt icon detailsIcon"></i></a></td>
                                
                            </tr>
                           <?php
                      }
                  }
                  else{
                    ?>
                    <tr>
                    <td colspan="9"><span class="fail" style="textalign:center; color: red; font-size=25px; margin: 2rem 1rem;">No data in the database!</span></td>
                    </tr>
                    <?php

                  }
                }
                else{
                  die('Failed to connect to the database!');
                }
                
                ?>

              
            </table>
          </div>
          
        

        </div>
      </div>
  </div>

  <?php include('partials/footer.php')?>