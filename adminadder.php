
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    adminMaster();

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
         $fname =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['firstname']))))));
          $email =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['email'])))));
           $pmobile =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['mobilephone'])))));
            $secretQuest =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['secretQuest']))))));
            $secretAns =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['secretAns'])))));
             $privilege =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['privilege']))))));
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

         // for email validation
        if ($email != null && !empty($email)) {
          //checking email on DBase
            $queryCheckMail = "SELECT email_address FROM users_admin WHERE email_address = '$email'";
            $queryCheckMailRun = mysqli_query($conn, $queryCheckMail);
            if ($queryCheckMailRun == true and mysqli_num_rows($queryCheckMailRun) >= 1) {
                  $form_good_state = 0;
                  $emailErr = "Error, This email has been Registered.";
              }
        } else {
          $emailErr = "Invalid Email Entered ! ";
          $form_good_state = 0;
        }


             // for district validation
        if ($secretQuest == "What was the name of the town you were born?" ||  $secretQuest  == "Where did you attend your Primary School?" ||  $secretQuest  == "What is the name of your best Secondary School Mate?" || $secretQuest == "Who was the best tutor you loved during your Secondary School day?"){
        } else {
          $secretQErr = "Invalid Secret Question has been Selected ! ";
          $form_good_state = 0;
        }

        // for secret answer validation
        if ($secretAns != null && !empty($secretAns)) {
        } else {
          $secretAnsErr = "Invalid Secret Answer Provided ! ";
          $form_good_state = 0;
        }

        
             // for privilege validation
        if ($privilege == "Level 1 (Can Only Search for an Invoice)" ||  $privilege  == "Level 2 (Can Search, Sale Products and generate new Invoice)" ||  $privilege  == "Level 3 (Same as Level 2 but can also add a new Admin/User)"){
        } else {
          $privilegeErr = "Invalid Privilege has been Selected ! ";
          $form_good_state = 0;
        }

            // for privilege number setter
        if ($privilege == "Level 3 (Same as Level 2 but can also add a new Admin/User)") {
          $privilege = "3";
        } else if ($privilege == "Level 2 (Can Search, Sale Products and generate new Invoice)") {
          $privilege = "1";
        } else {
          $privilege = "0";
        }


        if ($sname != null && !empty($sname) && $fname != null && !empty($fname) && $email != null && !empty($email) && $secretAns != null && !empty($secretAns) && $form_good_state == 1) {
        
                $daters = strval(date("Y-m-d (l)"));
                $timers = strval(date("h:i:s a"));
                $joindate_time = $daters . "  " . $timers;
                $password = rand(10000000, 10000000000);
                $password = 'ewds'.$password.'sdds'; 
                
                //here i sent an email
                require "PHPMailer/emailer.php";
                $subject = "Successful Registration with Solidnet Multi-Vision Services Limited.";
                $body = "<b>Good Day <font color='red'>$sname $fname</font>, Your new Password for Solidnet Multi-Vision Services Limited Account is:</b><h3><u>$password</u></h3><b>Use it to Sign into Your Account with Solidnet Multi-Vision Services Limited then proceed for Change of Password. <br><br> Make sure it is kept Saved and Secured.<br><br>We advice You delete this Message from Your Trash box for better Protection and Security <br><br> From Solidnet Multi-Vision Services Limited. <br><br> Best Regards !.</b>";
                $replyer = '';
                $status = mailFunction($email, $subject, $body, $replyer);

                if ($status == true) {
                  //here data is sent to database !
                  $query3 = "INSERT INTO users_admin(sur_name, first_name, email_address, phone_numebr, password, activation_status, rank, date_time_reg, secret_questions, secret_answer) VALUES ('$sname','$fname','$email','$pmobile','$password','1','$privilege','$joindate_time','$secretQuest','$secretAns')";
                  $queryrun3 = mysqli_query($conn, $query3);

                  if ($queryrun3 == true) {
                     header("location:adminadder.php?status=successfully&mail=$email&asfsdfdsf=sdfsdfasdfsdafs");
                  } else {
                     $alertError = "Sorry, We could not Query the Database !";   ;
                  }
                } else {
                    $alertError = "Sorry, We Could not Send an Email to $email !";
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
    <h3><u><center><b>Add a new Adminitrator/User to this Platform.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="adminadder.php" autocomplete="on">

        <p class="jumbotron">
          <label>Surname: (Required)</label>
          <input type="text" name="surname" required="" placeholder="Enter Surname" class="form-control" value="<?php if(isset($_POST['surname'])) {echo $_POST['surname']; } ?>" > <br><span style="color: red;"><i> <?php echo $sNameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Other Names: (Required)</label>
          <input type="text" name="firstname" required="" placeholder="Enter First Name" class="form-control" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname']; } ?>" > <br><span style="color: red;"><i> <?php echo $fNameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Email Address: (Required)</label>
          <input type="email" required="" name="email" placeholder="Enter Email Address" class="form-control" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>" > <br><span style="color: red;"><i> <?php echo $emailErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Mobile Phone Number: (Optional)</label>
          <input type="tel" minlength="11" maxlength="11" name="mobilephone" placeholder="Enter Mobile Phone Number" class="form-control" value="<?php if(isset($_POST['mobilephone'])) {echo $_POST['mobilephone']; } ?>" > <br><span style="color: red;"><i> <?php echo $pErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Secret Question {New Admin/User must provide and Answer} (Required)</label>
          <select  name="secretQuest" class="form-control">
            <option>Select Secret Question and Provide and Answer to it</option>
            <option>What was the name of the town you were born?</option>
            <option>Where did you attend your Primary School?</option>
            <option>What is the name of your best Secondary School Mate?</option>
            <option>Who was the best tutor you loved during your Secondary School day?</option>
          </select> <br><span style="color: red;"><i> <?php echo $secretQErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Secret Answer: {This May be use for Authentication} (Required)</label>
          <input type="text" required="" name="secretAns" placeholder="Enter Answer Here" class="form-control" value="<?php if(isset($_POST['secretAns'])) {echo $_POST['secretAns']; } ?>" > <br><span style="color: red;"><i> <?php echo $secretAnsErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Select the Admin/User's Privilege (Required)</label>
          <select  name="privilege" class="form-control">
            <option>Select the Admin/User Privilege</option>
            <option>Level 1 (Can Only Search for an Invoice)</option>
            <option>Level 2 (Can Search, Sale Products and generate new Invoice)</option>
            <option>Level 3 (Same as Level 2 but can also add a new Admin/User)</option>
          </select> <br><span style="color: red;"><i> <?php echo $privilegeErr;  ?> </i></span>
        </p>
        
        <p><center>
          <input type="submit" name="submit" value="Register Admin/User" class="form-control">
        </center> </p>
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