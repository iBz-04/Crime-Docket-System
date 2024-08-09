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
                <a href="incidents.php">
                  <span>All Types</span>
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
                            <label for="icnType">Incident Type ID</label>
                            <input type="text" name="incID" id="icnType" >
                        </div>
                        
                </div>
                
                <div class="rowsDiv">
                        <div class="row">
                            <label for="name">Incident Type Name</label>
                            <input type="text" name="incType" id="name" >
                        </div>

                        
                        <div class="row">
                            <input type="submit" name="submit" id="submitBtn" value="Search">
                        </div>

                </div>
            </div>
            </form>



            <table>
           
            <tr  class="tableHeader">
                  <th>Incident ID</th>
                  <th>Incident Type</th>
                  <th>Added On</th>
                  <th>Added By</th>
                  <th>Edit</th>
                </tr>


                <?php 
             

                if(isset($_POST['submit'])){
                    $incID = $_POST['incID'];
                    $incType = $_POST['incType'];
              

                    if($incID != "" || $incType != ""){

                        $sql = "SELECT * FROM incident_types WHERE id = '$incID' OR inctype_name = '$incType'";
                        $res = mysqli_query($conn, $sql);
                        if($res  == TRUE){
                     
                            $count = mysqli_num_rows($res);
                            if($count>0){
                              while($row = mysqli_fetch_assoc($res)){
                                $incidentId = $row['id'];
                                $icTypeName = $row['inctype_name'];
                                $addedBy = $row['added_by'];
                                $addedOn = $row['added_on'];

                                ?>
                                
                                <tr class="tableData">
                                <td><?php echo $incidentId;?></td>
                                <td><?php echo $icTypeName;?></td>
                                <td><?php echo $addedBy;?></td>
                                <td><?php echo $addedOn;?></td>
                                <td><a href="<?php echo SITEURL ?>updateIncident.php?id=<?php echo $incidentId?>"><i class="uil uil-edit icon editIcon"></i></a></td>
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
                        header('location:' .SITEURL. 'searcIncTypes.php');
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