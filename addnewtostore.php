
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    adminMaster();

    include "navigation.php";
   

    $pro_nameErr = ""; $descriptionErr = ""; $photoErr = ""; $unitpriceErr = ""; $quantityErr = "";
    $alertSuccess1 = ""; $alertError = "";

?>


<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 

//update status checker
 if (isset($_GET['2221111111update2221111111successfully']) && isset($_GET['nameofproductupdated'])) {
   if ($_GET['2221111111update2221111111successfully'] == "13454221155511updatesuccessfully9991112777") {
    $productName = $_GET['nameofproductupdated'];
    $alertSuccess1 = "<b><font color='red'><u>$productName</u></font> &nbsp Was Successfully Updated and Saved to Store!<br> It's Now Available for Search and Enquiries. </b>";
   }
 }

//status checker.
 if (isset($_GET['2221111111added2221111111successfully']) && isset($_GET['nameofproduct'])) {
   if ($_GET['2221111111added2221111111successfully'] == "13454221155511addedsuccessfully9991112777") {
    $productName = $_GET['nameofproduct'];
    $alertSuccess1 = "<b><font color='red'><u>$productName</u></font> &nbsp Was Successfully Added to the Store!<br> It's Now Available for Search and Enquiries. </b>";
   }
 }


//here i began form validation
    if (isset($_POST['submit'])) {
      if ($conn == true) {
           $form_good_state = 1;
        
        $pro_name =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['pro_name']))))));
        $description =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['description']))))));
        $quantity =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['quantity'])))));
        $unitprice =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['unitprice'])))));
        $daters = strval(date("Y-m-d (l)"));
        $timers = strval(date("h:i:s a"));
        $joindate_time = $daters . "  " . $timers;
        $photo_name = strval(date("ymdHis")); 
        $added_by = $_SESSION['sur_name']. " " . $_SESSION['first_name'];

        // for productname validation
        if ($pro_name != null && !empty($pro_name)) {
        } else {
          $pro_nameErr = "Invalid Product/Service Name Provided ! ";
          $form_good_state = 0;
        }

        // for productdescription validation
        if ($description != null && !empty($description)) {
        } else {
          $descriptionErr = "Invalid Product/Service Description Provided ! ";
          $form_good_state = 0;
        }


        //photo upload and validation

        if (basename($_FILES["photos"]["name"]) != null && !empty(basename($_FILES["photos"]["name"]))) {
              $target_dir = "Sample_photos/";
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
              if ($_FILES["photos"]["size"] > 2000000) {
                  $photoErr .= "Sorry, The Sample Photo File is large or Bigger than 2 Mb.<br>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                  $photoErr .= "Sorry, only JPG, JPEG & PNG files are allowed.<br>";
                  $uploadOk = 0;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk != 0 && $uploadOk == 1 &&  $form_good_state == 1) {
                   // if everything is ok, try to upload file
                  if (move_uploaded_file($_FILES["photos"]["tmp_name"], $real_name) && $form_good_state == 1) {
                    //now i will insert data to the database
                    $query1 = "INSERT INTO product_stored(product_name, product_decription, product_quantity, product_price_per_each, product_image_name, added_by, time_date_added) VALUES ('$pro_name', '$description', '$quantity', '$unitprice', '$real_name', '$added_by', '$joindate_time')";
                    $query1_run = mysqli_query($conn, $query1);
                    if ($query1_run == true) {
                      header("location: addnewtostore.php?2221111111added2221111111successfully=13454221155511addedsuccessfully9991112777&nameofproduct=$pro_name");
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

            } else if($form_good_state == 1) {
              //now i will insert data to the database
              //upload name and description only
              $query1 = "INSERT INTO product_stored(product_name, product_decription, product_quantity, product_price_per_each, product_image_name, added_by, time_date_added) VALUES ('$pro_name', '$description', '$quantity', '$unitprice', 'no_pics', '$added_by', '$joindate_time')";
                    $query1_run = mysqli_query($conn, $query1);
                    if ($query1_run == true) {
                      header("location: addnewtostore.php?2221111111added2221111111successfully=13454221155511addedsuccessfully9991112777&nameofproduct=$pro_name");
                    } else {
                      $alertError .= "Sorry, We encounter a Problem adding this Product/Serivce to the Store! Check for Error Below. ";
                    }

            }

            }
        }
        include "sideLinks.php";
  ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->


<?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
    <h3><u><center><b>Add Up a New and Non-Existing Product/Service to the Store.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="addnewtostore.php" autocomplete="on" enctype="multipart/form-data">

        <p class="jumbotron">
          <label>Product/Service Name: (Required)</label>
          <input type="text" name="pro_name" required="" placeholder="Enter Product/Service Name" class="form-control" value="<?php if(isset($_POST['pro_name'])) {echo $_POST['pro_name']; } ?>" > <br><span style="color: red;"><i> <?php echo $pro_nameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Product/Service Description: (Required)</label>
          <input type="text" name="description" required="" placeholder="Enter Product/Service Description" class="form-control" value="<?php if(isset($_POST['description'])) {echo $_POST['description']; } ?>" > <br><span style="color: red;"><i> <?php echo $descriptionErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Product/Service Sample Photo: (Optional){JPG, JPEG and PNG Allowed. Not More than 2 Mb.} </label>
          <input type="file" name="photos" placeholder="Select a Sample Photo" class="form-control" value="<?php if(isset($_POST['photos'])) {echo $_POST['photos']; } ?>" > <br><span style="color: red;"><i> <?php echo $photoErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Quantity Available in Store: (Optional)</label>
          <input type="number" name="quantity" placeholder="Enter Quantity Currently Available in Store" class="form-control" value="<?php if(isset($_POST['quantity'])) {echo $_POST['quantity']; } ?>" > <br><span style="color: red;"><i> <?php echo $quantityErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Product/Service One Unit Price: (Optional)</label>
          <input type="number" name="unitprice" placeholder="Enter The Product/Service One Unit Price" class="form-control" value="<?php if(isset($_POST['unitprice'])) {echo $_POST['unitprice']; } ?>" > <br><span style="color: red;"><i> <?php echo $unitpriceErr;  ?> </i></span>
        </p>
        
        
        <p><center>
          <input type="submit" name="submit" value="Add to Store" class="form-control">
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