<?php
 include('partials/headerSection.php');
ob_start();
?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
        <div class="dashboardTitle">
            <h1>Search Page</h1>
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
             <h3 class="title">Fill the form below!</h3>
           
            <div class="buttons flex" style="gap: 10px;">
              <div class="addBtn">
                <a href="cases.php">
                  <span>Follow New Case</span>
                </a>
              </div>
               <div class="addBtn excelBtn" >
                <a href="#">
                  <span>Export Excel</span>
                </a>
              </div>
            </div>
           </div>
          </div>

         
         
          <div class="mainItems">
          <div class="addCaseContainer flex">

                <div class="rowsDiv">
                    <form action ="" method ="POST">
                        <div class="row">
                            <label for="icnType">Incident Type</label>
                            <input type="text" name="sType" id="icnType" >
                        </div>
                        <div class="row">
                            <label for="status">Incident Status</label>
                            <input type="text" name="sStatus" id="status" >
                        </div>
                </div>
                
                <div class="rowsDiv">
                        <div class="row">
                            <label for="id">Incident Date</label>
                            <input type="date" name="sDate" id="id" >
                        </div>

                        <div class="row">
                            <label for="obNmbr">OB Number</label>
                            <input type="text" name="OBNumber" id="obNmbr" placeholder="Enter the OB Number last slash digits eg. /xx ">
                        </div>
                        <div class="row">
                            <input type="submit" name="submit" id="submitBtn" value="Search">
                        </div>

                </div>
            </div>
            </form>



            <table>
           
                <tr  class="tableHeader">
                  <th>OB No.</th>
                  <th>Incident Type</th>
                  <th>Time(Followed)</th>
                  <th>Followed By</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Details</th>
                </tr>


                <?php 
             

                if(isset($_POST['submit'])){
                    $sDate = $_POST['sDate'];
                    $sType = $_POST['sType'];
                    $sStatus = $_POST['sStatus'];
                    $OBNumber = $_POST['OBNumber'];

                    

                    if($sType != "" || $sStatus != "" || $sDate != "" || $OBNumber != ""){

                        $sql = "SELECT * FROM followedup_table WHERE incident_type = '$sType' OR case_status = '$sStatus' OR incident_date = '$sDate' OR ob_number = '$OBNumber'";
                        $res = mysqli_query($conn, $sql);
                        if($res  == TRUE){
                     
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
                              
                            
                               <td><a href="<?php echo SITEURL?>updatefollowup.php?id= <?php echo $id;?>"><i class="uil uil-edit icon editIcon"></i></a></td>
                            
                               <td><a href="<?php echo SITEURL?>followupdetails.php?id= <?php echo $id;?>"><i class="uil uil-file-info-alt icon detailsIcon"></i></a></td>
                               
                           </tr>
                          <?php

                         

                                }
          
                            }
                            else{
                              ?>
                              <tr>
                              <td colspan="9"><span class="fail" style="textalign:center; color: red; font-size=25px; margin: 2rem 1rem;">No results in the database, change your search field!</span></td>
                              </tr>
                              <?php
          
                            }

                          }
                          else{
                            die("Failed to connect!");
                          }
                    }
                    else{
                        $_SESSION['Search'] = '<span class="fail"> Enter any valid search!</span>';
                        header('location:' .SITEURL. 'searcFollowup.php');
                        exit();
                    }

                    
    
                    

                }
                
               

                ?>
            
         
              
            </table>
            

          </div>
          
        

        </div>
      </div>
  </div>

  <?php include('partials/footer.php')?>