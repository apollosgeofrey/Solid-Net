
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    include "navigation.php";
?>


<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->

    <h3><u><center><b>My Profile Registered Information</b></center></u></h3>
    <!-- this is my error shower -->

    <form method="post" action="myProfile.php" autocomplete="on">
        <p class="jumbotron">
              <button><a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Back </a></button>
              <button class="pull-right"><a href="editProfileData.php"><span class="glyphicon glyphicon-edit"></span> Edit Account </a></button><br><br><br>
          
          <label>Surname: </label>
          <input type="text" disabled="" name="surname" required="" placeholder="" class="form-control" value="<?php if(isset($_SESSION['sur_name'])) {echo $_SESSION['sur_name']; } ?>" ><br>
       
          <label>Other Names: </label>
          <input type="text" name="firstname" disabled="" required="" placeholder="Enter First Name" class="form-control" value="<?php if(isset($_SESSION['first_name'])) {echo $_SESSION['first_name']; } ?>" > <br>

          <label>Email Address: </label>
          <input type="email" required="" name="email" disabled="" placeholder="Enter Email Address" class="form-control" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>" > <br>
        
          <label>Mobile Phone Number: </label>
          <input type="tel" minlength="11" maxlength="11" disabled="" name="mobilephone" placeholder="Enter Mobile Phone Number" class="form-control" value="<?php if(isset($_SESSION['phone_numebr'])) {echo $_SESSION['phone_numebr']; } ?>" > <br>
        
          <label>My Secret Question: </label>
            <select  name="secretQuest" class="form-control" disabled="">
            <option><?php if (isset($_SESSION['secret_questions'])) {echo $_SESSION['secret_questions'];} ?></option>
          </select><br>
        
          <label>Secret Answer: {This May be use for Authentication} </label>
          <input type="text" required="" name="secretAns" disabled="" placeholder="Enter Answer Here" class="form-control" value="<?php if(isset( $_SESSION['secret_answer'])) {echo $_SESSION['secret_answer']; } ?>" > <br>

         <label>Admin/User's Privilege: </label>
          <select  name="privilege" class="form-control" disabled="">
            <option><?php if (isset($_SESSION['rank'])) {
              if ($_SESSION['rank'] == "1") {
                echo "Level 2 (Can Search, Sale Products and generate new Invoice)";
              } else if ($_SESSION['rank'] == "3") {
                echo "Level 3 (Same as Level 2 but can also add a new Admin/User)";
              } else {
                echo"Level 1 (Can Only Search for an Invoice)";
              }
            } ?></option>
          </select><br>

          <label>Date and time of Registration: </label>
          <input type="text" required="" name="dateReg" disabled="" placeholder="Date and Time" class="form-control" value="<?php if(isset($_SESSION['date_time_reg'])) {echo $_SESSION['date_time_reg']; } ?>" > <br>
        

             <b><br><br>  <button><a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Back </a></button>
              <button class="pull-right"><a href="editProfileData.php"><span class="glyphicon glyphicon-edit"></span> Edit Account </a></button><br></b>
    </form>

<!-- End of Content -->
    </div>
  </div>
   <!-- <div class="col-sm-1 sidenav">
     <?php
     // here is the included ads page
        //include "ads.php";
      ?>
    </div>-->

  </div>
</div>

<br>
<?php
// here is the included footer
include "footer.php";
ob_flush();
?>