<?php include('partials/headerSection.php')?>

  <div class="main">
  <?php include('partials/sideMenu.php')?>

      <div class="mainContent">
        <div class="topSection flex">
          <div class="dashboardTitle">
            <h1>Settings Page</h1>
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
             <h3 class="title">Settings</h3>
            <div class="addBtn">
              <a href="dashboard.php">
                <span>Save Settings</span>
              </a>
            </div>
           </div>
          </div>

          <div class="mainItems">
            <div class="addCaseContainer flex">

            <div class="rowsDiv">
              <div class="row">
                <label for="firstAName">Full Name <small>Click to change</small></label>
                <input type="text" id="firstAName" >
               </div>
              <div class="row">
                <label for="secondName">Second Name <small>Click to change</small></label>
                <input type="text" id="secondName" >
               </div>
               <div class="row">
                <label for="id">Employee ID No. <small>Click to change</small></label>
                <input type="text" id="id" >
               </div>

               <div class="row">
                <label for="currentPassword">Current Password <small>Click to change</small></label>
                <input type="password" id="currentPassword" >
               </div>
              
              
            </div>
            <div class="rowsDiv">
            <div class="row">
                <label for="newPassword">New Password <small>Click to change</small></label>
                <input type="password" id="newPassword" >
               </div>
               <div class="row">
                <label for="confirmPassword">confirm Password <small>Click to change</small></label>
                <input type="password" id="confirmPassword">
               </div>
               <div class="row">
                <label for="roles">My Role <small>Click to change</small></label>
                <select id="roles">
                  <option value="admin" selected>Administrator</option>
                  <option value="editor" >Editor</option>
                </select>
               </div>
               <div class="row">
                    <!-- <input type="hidden" name="updatedID" value="<?php echo $id; ?>"> -->
                      <input type="submit" name="submit" id="submitBtn" value="Update">
                    </div>
            </div>

            </div>
          </div>
          
        

        </div>
      </div>
  </div>

<script>
//Image Upload Functionality
const file = document.getElementById('file')
const img = document.querySelector('#image')

 //Function to change image
 file.addEventListener('change', function(){
    const choosedFile = this.files[0]
    if(choosedFile){
        const reader = new FileReader();
        
        reader.addEventListener('load', function(){
           img.setAttribute('src', reader.result)  
        })
        reader.readAsDataURL(choosedFile)
    }
  })
  </script>

<?php include('partials/footer.php')?>