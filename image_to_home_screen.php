
<?php 
ob_start();
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     adminMaster();
    include "navigation.php";
  
//success and error variable.
 $photoErr = ""; $alertError = ""; $alertSuccess1 = "";
?>
<style type="text/css">
  ul li:hover{font-size: 18px; background: lightblue; color: white;}
</style>
<?php
if (isset($_GET['2221111added22211111successfully'])) {
  if ($_GET['2221111added22211111successfully'] == '134542211511addedsuccessfully9991777') {
    $alertSuccess1 = "The Home Screen Image has been added Successfully!";
  }
}


  if (isset($_POST['submit'])) {
        $daters = strval(date("Y-m-d (l)"));
        $timers = strval(date("h:i:s a"));
        $joindate_time = $daters . "  " . $timers;
        $photo_name = strval(date("ymdHis")); 
        $added_by = $_SESSION['sur_name']. " " . $_SESSION['first_name'];

    if (basename($_FILES["photos"]["name"]) != null && !empty(basename($_FILES["photos"]["name"]))) {
              $target_dir = "Server_Pics/";
              $target_file = $target_dir . basename($_FILES["photos"]["name"]);
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
              $real_name = $target_dir . $photo_name .".". $imageFileType;
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["photos"]["tmp_name"]);
                  if($check !== false) {
                      //$photoErr = " File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      $photoErr .= "Sorry, The Sample Photo File is not an image.<br>";
                      $uploadOk = 0;
                  }
              }
              
              // Check file size
              if ($_FILES["photos"]["size"] > 4000000) {
                  $photoErr .= "Sorry, The Sample Photo File is large or Bigger than 4 Mb.<br>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                  $photoErr .= "Sorry, only JPG, JPEG & PNG files are allowed.<br>";
                  $uploadOk = 0;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk != 0 && $uploadOk == 1) {
                   // if everything is ok, try to upload file
                  if (move_uploaded_file($_FILES["photos"]["tmp_name"], $real_name) && $uploadOk == 1) {
                    //now i will insert data to the database
                    $query1 = "INSERT INTO `home_screen_content`(`content_type`, `image_path_name`, `date_added`, `added_by`) VALUES ('slide_image', '$real_name', '$joindate_time', '$added_by')";
                    $query1_run = mysqli_query($conn, $query1);
                    if ($query1_run == true) {
                      header("location: image_to_home_screen.php?2221111added22211111successfully=134542211511addedsuccessfully9991777");
                    } else {
                      $alertError .= "Sorry, We encounter a Problem adding this Product/Serivce to the Store !. ";
                    }

                      $alertSuccess1 = "The file ". basename( $_FILES["photos"]["name"]). " has been uploaded.";
                  } else {
                      $alertError = "Sorry, there was an error uploading the Sample Photo file.";
                  }
              } else {
                      $alertError .= "Sorry, We encounter a Problem adding this Product/Serivce to the Store! Check for Error Below. ";
              }

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


 <form method="post" action="image_to_home_screen.php" autocomplete="on" enctype="multipart/form-data">
        <p class="jumbotron">
          <label>Choose an Image: (Required){only JPG, JPEG or PNG Allowed. Recommended ration = 100% : 75%} </label>
          <input type="file" name="photos" required="" placeholder="Select a Sample Photo" class="form-control" value="<?php if(isset($_POST['photos'])) {echo $_POST['photos']; } ?>" > <br><span style="color: red;"><i> <?php echo $photoErr;  ?> </i></span>
        </p>

          <p><center>
          <input type="submit" name="submit" value="Upload to Slide" class="form-control">
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