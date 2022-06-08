
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    include "navigation.php";
   

    $newpassErr = ""; $confirmnewpassErr = ""; $currentpassErr = ""; $alertSuccess1 = ""; $alertError = ""; $alertError1 = "";

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

            //new collection
        $currentpass =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['currentpass'])))));
        $newpass =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['newpass'])))));
        $confirmnewpass =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['confirmnewpass'])))));


        // for current validation
        if ($currentpass != null && !empty($currentpass)) {
          if ($currentpass === $_SESSION['password']){ 
          } else if ($currentpass != $_SESSION['password']) {
            $currentpassErr = "Current Password is Incorrect ! ";
            $form_good_state = 0;
          } else {
            $currentpassErr = "Current Password is Incorrect ! ";
            $form_good_state = 0;
          }
        } else {
          $currentpassErr = "Invalid Current Password Entered ! ";
          $form_good_state = 0;
        }


        // for newpass validation
        if ($newpass != null && !empty($newpass)) {
        } else {
          $newpassErr = "New Password Entered is Invalid ! ";
          $form_good_state = 0;
        }


        // for confirm answer validation
        if ($confirmnewpass != null && !empty($confirmnewpass)) {
        } else {
          $confirmnewpass = "Confirm Password Entered is Invalid ! ";
          $form_good_state = 0;
        }

        // for confirm answer validation
        if ($confirmnewpass === $newpass) {
        } else {
          $alertError1 = "New Password and Confirm Password Fields does not Match ! ";
          $confirmnewpassErr = "Password Mis-Matched !.";
          $newpassErr = "Password Mis-Matched !.";
          $form_good_state = 0;
        }

        
        if ($confirmnewpass === $newpass && $newpass != null && !empty($newpass) && $confirmnewpass != null && !empty($confirmnewpass) && $form_good_state = 1 && $currentpass === $_SESSION['password']) {
               
                  //here data is sent to database !
                  $emailadd = $_SESSION['email'];
                  $query3 = "UPDATE users_admin SET password='$newpass' WHERE email_address='$emailadd'";
                  $queryrun3 = mysqli_query($conn, $query3);

                  if ($queryrun3 == true) {
                     header("location:login.php?gkjskdjkasduuekfuedfsdaffadfasd=jkahdkahdhjdakdasuirsfsdfdsfsdfsddafs&lkklldshflkdjhlkhlkdfsdff=jkflkjfnmfnvklhsdfsf");
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
<?php if ($alertError1 != "") { echo "<br><p class='alert alert-danger text-center'> $alertError1 </p>"; $alertError1 = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
    <h3><u><center><b>Editing My Profile Information.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="changeMyPasscode.php" autocomplete="on">
       <p class="well">
              <a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Back </a>
        </p>

        <p class="jumbotron">
          <label>Current Password: (Required)</label>
          <input type="password" name="currentpass" required="" placeholder="Enter Your Current Password" class="form-control" value="<?php if(isset($_POST['currentpass'])) {echo $_POST['currentpass'];} ?>" > <br><span style="color: red;"><i> <?php echo $currentpassErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>New Password: (Required)</label>
          <input type="password" name="newpass" required="" placeholder="Enter Your New Password" class="form-control" value="<?php if(isset($_POST['newpass'])) {echo $_POST['newpass'];} ?>" > <br><span style="color: red;"><i> <?php echo $newpassErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Confirm New Password: (Required)</label>
          <input type="password" name="confirmnewpass" required="" placeholder="Confirm Your Current Password" class="form-control" value="" > <br><span style="color: red;"><i> <?php echo $confirmnewpassErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <input type="submit" name="submit" value="Change Password Now" class="form-control"><br>
         <a href="profilesetting.php"><span class="glyphicon glyphicon-arrow-left"></span> Cancel </a>
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