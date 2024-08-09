<?php include('partials/headerSection.php')?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
        <div class="dashboardTitle">
            <h1>Incident Types Page</h1>
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
             <h3 class="title">All Incidents</h3>

             <?php 
             
             if(isset($_SESSION['incidentAdded'])){

              echo $_SESSION['incidentAdded'];
              unset ($_SESSION['incidentAdded']);
             }

             if(isset($_SESSION['incident'])){

              echo $_SESSION['incident'];
              unset ($_SESSION['incident']);
             }

             if(isset($_SESSION['updateIncident'])){

              echo $_SESSION['updateIncident'];
              unset ($_SESSION['updateIncident']);
             }

             ?>

            <div class="buttons flex" style="gap: 10px;">
              <div class="addBtn">
                <a href="addIncident.php">
                  <span>Add Incident</span>
                </a>
              </div>
               <div class="addBtn excelBtn" >
                <a href="#">
                  <span>Export Excel</span>
                </a>
              </div>
              <div class="addBtn">
                <a href="searcIncTypes.php">
                  <span>Search</span>
                </a>
              </div>
            </div>
           </div>
          </div>
          <div class="mainItems">
            <table>
           
                <tr  class="tableHeader">
                  <th>Incident ID</th>
                  <th>Incident Type</th>
                  <th>Added By</th>
                  <th>Added On</th>
                  <th>Edit</th>
                </tr>

                <?php 
                
                $sql = "SELECT * FROM incident_types";
                $result = mysqli_query($conn, $sql);
                if($result == TRUE){
                  $count = mysqli_num_rows($result);
                   if($count > 0){
                     while($row = mysqli_fetch_assoc($result)){
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
                    $_SESSION['incident'] = '<span class="fail"> No single incident!</span>';
                  
                   }
                }

                else{
                  die('Failed to Connect!');
                }
                
                
                ?>

            </table>
          </div>
          
        

        </div>
      </div>
  </div>



  <?php include('partials/footer.php')?>