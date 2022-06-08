
<?php 
ob_start();
//here is the included header and Navigtion pages !!!
    include "header.php";
        $alertSuccess1 = ""; $alertError = ""; $emailErr = "";  $passErr = "";

if (isset($_GET['afdsfdfsdfsdfsdaffadfasd'])) {
  if ($_GET['afdsfdfsdfsdfsdaffadfasd'] == "ghfdsfsdffdsdasdasasfsdfdsfsdfsddafs") {
    session_destroy();
    $alertSuccess1 = "Your Account Information Was Successfully Updated<br>You must Sign-in to Startup a New Session !.";
  } else {
    session_destroy();
    header("location:login.php");
  }
} else if (isset($_GET['gkjskdjkasduuekfuedfsdaffadfasd'])) {
  if ($_GET['gkjskdjkasduuekfuedfsdaffadfasd'] == "jkahdkahdhjdakdasuirsfsdfdsfsdfsddafs") {
    session_destroy();
    $alertSuccess1 = "Your Account Password is Successfully Updated<br>You must Sign-in to Startup a New Session !.";
  } else {
    session_destroy();
    header("location:login.php");
  } 
} else if (isset($_SESSION['email'])) {
   session_destroy();
   header("location:login.php");
}

    include "navigation.php";


     if (isset($_POST['submit'])) {
       $email =  strtolower(trim(htmlentities(mysqli_escape_string($conn, stripslashes($_POST['email'])))));
       $password =  trim(htmlentities(mysqli_escape_string($conn, stripslashes($_POST['password']))));
       if ($email != NULL && !empty($email)) {
         if ($password != NULL && !empty($password)) {
          $query1 = "SELECT * FROM `users_admin` WHERE email_address = '$email' and password = '$password'";
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
              $rank = $rows['rank'];
              $date_time_reg = $rows['date_time_reg'];
              $secret_questions = $rows['secret_questions'];
              $secret_answer = $rows['secret_answer'];

              if ($activation_status == 0) {
                $alertError = "Sorry, The Master Admin Disabled this account !!! "; 
              } else {
                //here i started sessions for each users data
                $_SESSION['id'] = $id;
                $_SESSION['sur_name'] = $sur_name;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['email'] = $email_address;
                $_SESSION['phone_numebr'] = $phone_numebr;
                $_SESSION['password'] = $password;
                $_SESSION['activation_status'] = $activation_status;
                $_SESSION['rank'] = $rank;
                $_SESSION['date_time_reg'] = $date_time_reg;
                $_SESSION['secret_questions'] = $secret_questions;
                $_SESSION['secret_answer'] = $secret_answer;
                header("location:index.php");
              }
            }
          } else {
            $alertError = "Wrong Email and Password Combination !!!. ";
          }
         } else {
          $alertError = "Invalid Password !!!. ";
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
    <h3 class="text-center"><u>Login Dashboard !</u></h3>
    <form class="jumbotron" method="post" action="login.php">
      <?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
      <?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
      <p>
      <label>Email Address:</label>
      <input type="email" name="email" required="" placeholder="Enter your email address" class="form-control" style="text-align: center;" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>" > <br><span style="color: red;"><i> <?php echo $emailErr;  ?> </i></span>
    </p><br>
      <p>
        <label>Secret Password:</label>
      <input type="password" name="password" placeholder="Enter your Secret Password" class="form-control" style="text-align: center;" required=""> <br><span style="color: red;"><i> <?php echo $passErr;  ?> </i></span>
      </p>
      <br><br>
    <p><center>
      <input type="submit" name="submit" value="Login Now">
    </center></p>
    <a href="recoverPass.php?7272626sjgydsji72782khksd=892892kjehsjdho83ye092uklwdklsd093">Forgotten Password? </a>
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