<?php include('partials/headerSection.php')?>

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
                <a href="addCase.php">
                  <span>Add Case</span>
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
                            <label for="location">Incident Location</label>
                            <input type="text" name="sLocation" id="location" >
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
                  <th>Time(Reported)</th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Image(s)</th>
                  <th>Edit</th>
                  <th>Details</th>
                  <th>Follow</th>
                </tr>


                <?php 
             

                if(isset($_POST['submit'])){
                    $sDate = $_POST['sDate'];
                    $sType = $_POST['sType'];
                    $sStatus = $_POST['sStatus'];
                    $sLocation = $_POST['sLocation'];

                    

                    if($sType != "" || $sStatus != "" || $sDate != "" || $sLocation != ""){

                        $sql = "SELECT * FROM cases_table WHERE 
                        incident_type = '$sType' OR case_status = '$sStatus' 
                        OR incident_date = '$sDate' OR location = '$sLocation'";
                        $res = mysqli_query($conn, $sql);
                        if($res  == TRUE){
                     
                            $count = mysqli_num_rows($res);
                            if($count>0){
                              while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $incidentType = $row['incident_type'];
                                $incidentDate = $row['incident_date'];
                                $incidentTime = $row['incident_time'];
                                $caseStatus = $row['case_status'];
                                $caseCategory = $row['case_category'];

          
                                if($caseStatus=='Open'){
                                  ?>
                                  <tr class="tableData">
                                    <td><?php echo $incidentDate;?>/<?php echo $id;?></td>
                                    <td><?php echo $incidentType;?></td>
                                    <td><?php echo $incidentTime;?></td>
                                    <td><?php echo $caseStatus;?></td>
                                    <td><?php echo $caseCategory?></td>
                                    <td><i class="uil uil-paperclip icon" style="color: blue;"></i></td>
                             
          
                                    <td><a href="<?php echo SITEURL?>updateCase.php?id= <?php echo $id;?>"><i class="uil uil-edit icon editIcon"></i></a></td>
          
                                    <td><a href="<?php echo SITEURL?>details.php?id= <?php echo $id;?>"><i class="uil uil-file-info-alt icon detailsIcon"></i></a></td>
                                    
                                   <td><a href="<?php echo SITEURL?>following.php?id= <?php echo $id;?>"><i class="uil uil-arrow-from-right icon followIcon"></i></a></td>
                                  </tr>
            
                                  <?php
                                   $_SESSION['res']  = '<span class="success">Search Results</span>';

                                }
          
                                else{
                                  ?>
                                  <tr class="tableData">
                                    <td><?php echo $incidentDate;?>/<?php echo $id;?></td>
                                    <td><?php echo $incidentType;?></td>
                                    <td><?php echo $incidentTime;?></td>
                                    <td><?php echo $caseStatus;?></td>
                                    <td><?php echo $caseCategory?></td>
                                    <td><i class="uil uil-paperclip icon" style="color: blue;"></i></td>
                             
          
                                    <td><a href="<?php echo SITEURL?>updateCase.php?id= <?php echo $id;?>"><i class="uil uil-edit icon editIcon"></i></a></td>
          
                                    <td><a href="<?php echo SITEURL?>details.php?id= <?php echo $id;?>"><i class="uil uil-file-info-alt icon detailsIcon"></i></a></td>
                                    
                                    <td>
                                     <i class="uil uil-check-circle icon tickIcon"></i>
                                     </td>
            
                                  <?php
                                  

                                }

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
                        header('location:' .SITEURL. 'obsearc.php');
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