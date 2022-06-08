
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";

    include "navigation.php";
   

    $sNameErr = "";  $fNameErr = ""; $emailErr = ""; $pErr = ""; $secretQErr = ""; $secretAnsErr = ""; $privilegeErr = ""; $alertSuccess1 = ""; $alertError = "";

?>


<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 

//status checker.
 if (isset($_GET['status']) && isset($_GET['mail'])) {
   if ($_GET['status'] == "successfully") {
    $emailsend = $_GET['mail'];
    $alertSuccess1 = "<b>Successfully Registered!<br>An Email has been sent to <u>$emailsend</u>. <br>Obtain the Default Login Password from the mail<br> then Proceed for Change of Password to secure your Account with Solinet Services Limited. </b>";
   }
 }


//here i began form validation
    if (isset($_POST['submit'])) {
      if ($conn == true) {
           $form_good_state = 1;
        $sname =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['surname']))))));
         $fname =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['firstname']))))));
           $pmobile =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['mobilephone'])))));
            $secretAns =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['secretAns']))))));
              //new collection
             

        // for sname validation
        if ($sname != null && !empty($sname)) {
        } else {
          $sNameErr = "Invalid Surname Name Entered ! ";
          $form_good_state = 0;
        }


        // for fname validation
        if ($fname != null && !empty($fname)) {
        } else {
          $fNameErr = "Invalid Other Names Entered ! ";
          $form_good_state = 0;
        }


        // for secret answer validation
        if ($secretAns != null && !empty($secretAns)) {
        } else {
          $secretAnsErr = "Invalid Secret Answer Provided ! ";
          $form_good_state = 0;
        }

        
        if ($sname != null && !empty($sname) && $fname != null && !empty($fname) && $secretAns != null && !empty($secretAns) && $form_good_state == 1) {
               
                  //here data is sent to database !
                  $emailadd = $_SESSION['email'];
                  $query3 = "UPDATE users_admin SET sur_name='$sname', first_name='$fname', phone_numebr='$pmobile', secret_answer='$secretAns' WHERE email_address='$emailadd'";
                  $queryrun3 = mysqli_query($conn, $query3);

                  if ($queryrun3 == true) {
                     header("location:login.php?afdsfdfsdfsdfsdaffadfasd=ghfdsfsdffdsdasdasasfsdfdsfsdfsddafs&lkklldshflkdjhlkhlkdfsdff=jkflkjfnmfnvklhsdfsf");
                  } else {
                     $alertError = "Sorry, We could not Query the Database !";   ;
                  }
                } else {
          $alertError = "<br> Invalid Form Data Were Provided. See Errors Below!";
        }
    } else {
      $alertError ="<br> Sorry, Connection to the Database Server was not successful !!!";
    }
    }
        include "sideLinks.php";
   ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->


<?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
    <h3><u><center><b>Editing My Profile Information.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="editProfileData.php" autocomplete="on">
       <p class="jumbotron">
              <a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Back </a>
              <a href="myProfile.php" class="pull-right"><span class="glyphicon glyphicon-remove"></span> Stop Editing </a>
        </p>

        <p class="jumbotron">
          <label>Surname: (Required)</label>
          <input type="text" name="surname" required="" placeholder="Enter Surname" class="form-control" value="<?php if(isset($_SESSION['sur_name'])) {echo $_SESSION['sur_name']; } else {echo $_POST['surname'];} ?>" > <br><span style="color: red;"><i> <?php echo $sNameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Other Names: (Required)</label>
          <input type="text" name="firstname" required="" placeholder="Enter First Name" class="form-control" value="<?php if(isset($_SESSION['first_name'])) {echo $_SESSION['first_name'];} else {echo $_POST['firstname']; } ?>" > <br><span style="color: red;"><i> <?php echo $fNameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Email Address: (Required)</label>
          <input type="email" required="" name="email" disabled="" placeholder="Enter Email Address" class="form-control" value="<?php if(isset($_SESSION['email'])) {echo $_SESSION['email']; } else { echo $_POST['email']; } ?>" > <br><span style="color: red;"><i> <?php echo $emailErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Mobile Phone Number: (Optional)</label>
          <input type="tel" minlength="11" maxlength="11" name="mobilephone" placeholder="Enter Mobile Phone Number" class="form-control" value="<?php if(isset($_SESSION['phone_numebr'])) {echo $_SESSION['phone_numebr'];} else { echo $_POST['mobilephone']; } ?>" > <br><span style="color: red;"><i> <?php echo $pErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Secret Question: (Required)</label>
          <select  name="secretQuest" class="form-control" disabled="">
            <option><?php if (isset($_SESSION['secret_questions'])) {
              echo $_SESSION['secret_questions'];
            } ?></option>
          </select> <br><span style="color: red;"><i> <?php echo $secretQErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Secret Answer: {This May be use for Authentication} (Required)</label>
          <input type="text" required="" name="secretAns" placeholder="Enter Answer Here" class="form-control" value="<?php if(isset($_SESSION['secret_answer'])) {echo $_SESSION['secret_answer']; } else { echo $_POST['secretAns']; } ?>" > <br><span style="color: red;"><i> <?php echo $secretAnsErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
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
          </select> <br><span style="color: red;"><i> <?php echo $privilegeErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <input type="submit" name="submit" value="Update Profile Now" class="form-control"><br>
         <a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Back </a>
         <a href="myProfile.php" class="pull-right"><span class="glyphicon glyphicon-remove"></span> Stop Editing </a>
         </p>

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