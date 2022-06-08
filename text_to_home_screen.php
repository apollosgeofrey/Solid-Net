
<?php 
ob_start();
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     adminMaster();
    include "navigation.php";
  
//success and error variable.
 $alertError = ""; $alertSuccess1 = ""; $subject_colorErr = ""; $subject_matterErr = ""; $tect_contentErr = "";
?>
<style type="text/css">
  ul li:hover{font-size: 18px; background: lightblue; color: white;}
</style>
<?php

//updater notifyer
if (isset($_GET['2221111added2221jfklsdl1111successfullyfsfd'])) {
  if ($_GET['2221111added2221jfklsdl1111successfullyfsfd'] == '13454221151sfsdfsd1addedsuccessfully999177743sd') {
    $alertSuccess1 = "The Home Screen Notification Text has been Updated Successfully!";
  }
}



//adder notifyer
if (isset($_GET['2221111added22211111successfully'])) {
  if ($_GET['2221111added22211111successfully'] == '134542211511addedsuccessfully9991777') {
    $alertSuccess1 = "The Home Screen Notification Text has been added Successfully!";
  }
}


  if (isset($_POST['submit'])) {
        $form_good_state = 1;
        if (isset($conn) && $conn == true) {
              $title =  trim(htmlentities(mysqli_escape_string($conn, ucwords(stripslashes($_POST['subject_matter'])))));
              $color =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['subject_color']))))));
              $content =  trim(htmlentities(mysqli_escape_string($conn, ucwords(stripslashes($_POST['tect_content'])))));
              
              $daters = strval(date("Y-m-d (l)"));
              $timers = strval(date("h:i:s a"));
              $joindate_time = $daters . "  " . $timers;
              $added_by = $_SESSION['sur_name']. " " . $_SESSION['first_name'];        

                // for title validation
              if ($title != null && !empty($title)) {
              } else {
                $subject_matterErr = "Invalid Subject/Title Provided! ";
                $form_good_state = 0;
              }

              //submit validated form
              if ($form_good_state == 1 && !empty($title)) {
                $query_add = "INSERT INTO home_screen_content(`content_type`, `header`, `header_color`, `text_value`, `date_added`, `added_by`) VALUES ('home_text', '$title', '$color', '$content', '$joindate_time', '$added_by')";
                $query_add_run = mysqli_query($conn, $query_add);
                if ($query_add_run == true) {
                   header("location: text_to_home_screen.php?2221111added22211111successfully=134542211511addedsuccessfully9991777");
                } else {
                  $alertError = "Sorry, We could not Query the Database Machine!";
                }
              } else {
                $alertError = "Sorry! We encountered a problem submiting the Text to Home Screen. See Errors Below ";
              }
       } else {
          $alertError = "Sorry, We Cound not connect to the Server Computer!";
      }
  }
?>
<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
<br><br>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->
<?php
	if ($_SESSION['rank'] != '3') {
		die("<b>You are Denied Access to this Page!</b>");
	}
?>


<?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>


 <form method="post" action="text_to_home_screen.php" autocomplete="on">
         <p class="jumbotron">
          <label>Text Title: (Required)</label>
          <input type="text" name="subject_matter" required="" placeholder="Enter text Subject" class="form-control" value="<?php if(isset($_POST['subject_matter'])) {echo $_POST['subject_matter']; } ?>" > <br><span style="color: red;"><i> <?php echo $subject_matterErr;  ?> </i></span>

          <label>Pick Title Color: (Optional)</label>
           <input type="color" name="subject_color" placeholder="Select Title Color" class="form-control" value="<?php if(isset($_POST['subject_color'])) {echo $_POST['subject_color']; } ?>" > <br><span style="color: red;"><i> <?php echo $subject_colorErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Text Content: (Optional)</label>
          <input type="text" name="tect_content" style="height: 50px;" placeholder="Enter Text Contents" class="form-control" value="<?php if(isset($_POST['tect_content'])) {echo $_POST['tect_content']; } ?>" > <br><span style="color: red;"><i> <?php echo $tect_contentErr;  ?> </i></span>
        </p>

          <p><center>
          <input type="submit" name="submit" value="Upload Text to Home Screen" class="form-control">
        </center> </p>
</form>



<!-- End of Content -->
    </div>

  </div>
    
    <!--<div class="col-sm-1 sidenav">
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