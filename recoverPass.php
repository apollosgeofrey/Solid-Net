
<?php 
ob_start();
if (isset($_GET['7272626sjgydsji72782khksd'])) {
    if ($_GET['7272626sjgydsji72782khksd'] != '892892kjehsjdho83ye092uklwdklsd093') {
        die();
    }
} else {
    die();
}

//here is the included header and Navigtion pages !!!
    include "header.php";
    include "navigation.php";

    //destroy session and proceed
if (isset($_SESSION['email']) || isset($_SESSION['rank'])) {
  session_destroy();
  header("location:recoverPass.php?7272626sjgydsji72782khksd=892892kjehsjdho83ye092uklwdklsd093");

}

     $alertError = ""; $emailErr = "";  $passErr = ""; $alertSuc = "";
if (isset($_GET['suc0981237645suc'])) {
  if ($_GET['suc0981237645suc'] == 'suc0981237645suc') {
    $recorverMail = strtolower(trim($_GET['recorverMail']));
    $alertSuc = "Recovery Email has been sent to $recorverMail.";
  }
}

     if (isset($_POST['submit'])) {
       $email =  strtolower(trim(htmlentities(mysqli_escape_string($conn, stripslashes($_POST['email'])))));
       if ($email != NULL && !empty($email)) {
          $query1 = "SELECT * FROM `users_admin` WHERE email_address = '$email'";
          $queryrun1 = mysqli_query($conn, $query1);
          if ($queryrun1 == true && mysqli_num_rows($queryrun1) == 1) {
            while ($rows = mysqli_fetch_assoc($queryrun1)) {
              $id = $rows['id'];
              $sur_name = $rows['sur_name'];
              $first_name = $rows['first_name'];
              $email_address = $rows['email_address'];
              $phone_numebr = $rows['phone_numebr'];
              $password = $rows['password'];
              $activation_status = $rows['activation_status'];
              $secret_questions = $rows['secret_questions'];
              $secret_answer = $rows['secret_answer'];

              if ($activation_status == 0) {
                $alertError = "Sorry, The Master Admin Disabled this account !!! "; 
              } else {
                //here i started send Email for each users data
                require "PHPMailer/emailer.php";
                $subject = "Password Recovery Email Message from Solidnet Multi-Vision Services Limited";
                $body = "<b>Good Day <font color='red'>$sur_name $first_name</font>, Your last Password for Solidnet Multi-Vision Services Limited Account is:</b><h3><u>$password</u></h3><b>Use it to Login to Your Account with Solidnet Multi-Vision Services Limited and make sure it is Saved and Secured.<br><br>We advice You delete this Message from Your Trash box for Your Protection and Security <br><br> Best Regards !.</b>";
                $replyer = '';
                $status = mailFunction($email_address, $subject, $body, $replyer);
                if ($status == true) {
                   header("location:recoverPass.php?suc0981237645suc=suc0981237645suc&recorverMail=$email_address&7272626sjgydsji72782khksd=892892kjehsjdho83ye092uklwdklsd093");
                } else {
                  $alertError = "Sorry We Could not Send you an Email !.";
                }
              }
            }
          } else {
            $alertError = "An Invalid Email Address !!!. ";
          }
       } else {
        $alertError = "Invalid Email Address !!!. ";
       }
     }
?>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->
  <p>
    <h3 class="text-center"><u>Password Recovery Dashboard !</u></h3>
    <form class="jumbotron" method="post" action="recoverPass.php?7272626sjgydsji72782khksd=892892kjehsjdho83ye092uklwdklsd093">
      <?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
      <?php if ($alertSuc != "") { echo "<br><p class='alert alert-success text-center'> $alertSuc </p>"; $alertSuc = "";} ?>
      <p>
      <label>Email Address:</label>
      <input type="email" name="email" required="" placeholder="Enter your email address here" class="form-control" style="text-align: center;" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>" > <br><span style="color: red;"><i> <?php echo $emailErr;  ?> </i></span>
    </p><br><br>
    <p><center>
      <input type="submit" name="submit" value="Recover Now">
    </center></p>
    <a href="login.php">Sign In? </a>
    </form>
  </p>
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