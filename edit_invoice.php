
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
     generalAdminMaster();
    include "navigation.php";
      $product_nameErr = ""; $descriptionErr = ""; $quantityErr = ""; $unitpriceErr = ""; $depositedErr = ""; $serialnumberErr = ""; $fullnameErr = ""; $phonenumberErr = ""; $emailErr = ""; $homeaddressErr = ""; $lpo_noErr = "";
    $alertSuccess1 = ""; $alertError = ""; $alertError1 = "";

?>


<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 

//fectching old values
   if (isset($_GET['editdata55554444333322221111']) && isset($_GET['id']) && isset($_GET['receipt_number'])) {
     if ($_GET['editdata55554444333322221111'] == "editdata11112222333344445555" && !empty($_GET['id']) && !empty($_GET['receipt_number'])) {
        $idsent = $_GET['id'];
        $receipt_number_sent = $_GET['receipt_number'];
        $query_fecth = "SELECT * FROM product_issued WHERE '$idsent' = id AND '$receipt_number_sent' = receipt_number";
        $query_fecth_run = mysqli_query($conn, $query_fecth);
        if ($query_fecth_run == true && mysqli_num_rows($query_fecth_run) > 0) {
          while ($rows = mysqli_fetch_assoc($query_fecth_run)) {
            $id = $rows['id'];
            $receipt_number = $rows['receipt_number'];
            $product_name_issued = $rows['product_name_issued'];
            $product_decription_issued = $rows['product_decription_issued'];
            $product_quantity_issued = $rows['product_quantity_issued'];
            $product_price_per_each_issued = $rows['product_price_per_each_issued'];
            $Amount_Paid = $rows['Amount_Paid'];
            $product_serial_number_issued = $rows['product_serial_number_issued'];
            $product_issued_to = $rows['product_issued_to'];
            $product_receivers_phone_number = $rows['product_receivers_phone_number'];
            $product_receivers_email = $rows['product_receivers_email'];
            $product_receivers_address = $rows['product_receivers_address'];
            $lpo_no_collect = $rows['LPO_NO'];
          }
        } else {
          $alertError = "Sorry, We could not Query the Database Server !.";
        }
     } else {
        header("Location: productServices.php");
     } 
   } else {
      header("Location: productServices.php");
   }



//here i began form validation
    if (isset($_POST['submit'])) {
      if ($conn == true) {
           $form_good_state = 1;
      $product_name =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['product_name']))))));
      $description =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['description']))))));
      $quantity =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['quantity']))))));
      $unitprice =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['unitprice']))))));
      $deposited =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['deposited']))))));
      $serialnumber =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['serialnumber']))))));
      $fullname =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['fullname']))))));
      $phonenumber =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucfirst(stripslashes($_POST['phonenumber']))))));
      $client_email =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, strtolower((stripslashes($_POST['email'])))))));
      $homeaddress =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, ucwords(stripslashes($_POST['homeaddress'])))))); 
      $lpo_no = trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['lpo_no'])))));
              //new collection
             

        // for product name validation
        if ($product_name != null && !empty($product_name)) {
        } else {
          $product_nameErr = "Invalid Product Name Entered ! ";
          $form_good_state = 0;
        }


        // for quantity validation
        if ($description != null && !empty($description)) {
        } else {
          $descriptionErr = "Invalid Product Description Provided ! ";
          $form_good_state = 0;
        }

        // for quantity validation
        if ($quantity != null && !empty($quantity)) {
        } else {
          $quantityErr = "Provided a valid product quantity issued out in Numbers ! ";
          $form_good_state = 0;
        }

        // for unit price validation
        if ($unitprice != null && !empty($unitprice)) {
        } else {
          $unitpriceErr = "Product/Service Unit Price shound be entered in Numbers Only ! ";
          $form_good_state = 0;
        }

        // for deposited validation
        if ($deposited != null && !empty($deposited)) {
        } else {
          $depositedErr = "Enter Amount Deposited by Client here ! ";
          $form_good_state = 0;
        }

        // for client full name validation
        if ($fullname != null && !empty($fullname)) {
        } else {
          $fullname = "Provide the Client's Name in Full here ! ";
          $form_good_state = 0;
        }

        //checking the balance
      if ($quantity != null && $unitprice != null && $deposited != null && !empty($quantity) && !empty($unitprice) && !empty($deposited)) { 
        $amount_due = $unitprice * $quantity;
        $balance = $amount_due - $deposited;
        if ($balance < 0) {
          $alertError1 = "It seems the Amount Deposited is More than the Expected Bill of $amount_due.00; Where Quantity= $quantity and One Unit Price= N $unitprice.00";
          $form_good_state = 0;
        } 
     } else {
      $form_good_state = 0;
     }

        if ($product_name != null && !empty($description) && $quantity != null && !empty($unitprice) && $deposited != null && $form_good_state == 1) {
        
                $daters = strval(date("Y-m-d (l)"));
                $timers = strval(date("h:i:s a"));
                $joindate_time = $daters . "  " . $timers; 
                
                //here i sent an email
                require "PHPMailer/emailer.php";
                $subject = "Editted Solidnet Invoice($receipt_number) Generated for ". strtoupper($product_name) ." and issued to $fullname .";
                $body = "<b>Good Day Sir.<font color='red'> ".$_SESSION['sur_name']. " " . $_SESSION['first_name']. "</font>, has Editted a Payment Invoice once issued to $product_issued_to and  re-issue to <font color='red'> $fullname </font> for the following Products/Services :</b><h3><u>$product_name <br>Description: $description </u></h3><b>The Invoice ID is: $receipt_number <br> The Quantity Issued is: $quantity, <br> The Total Amount Due is: N $amount_due .00 <br> The Deposited Amount is: N $deposited .00 <br> The Balance left is: N $balance .00 <br><br> Visit the Official Website and Login to See Other Relevant Details.<br><a href='www.solidnetservices.epizy.com' target='__ new'>www.solidnetservices.com.ng</a> <br><br> From Solidnet Multi-Vision Services Limited. <br><br> Best Regards !.</b>";
                $replyer = '';
                $split_fullname = explode(" ", $fullname);
                $split_fullname_lenght = count($split_fullname);
                if ($split_fullname_lenght == 1) {
                  $fname1 = $split_fullname[0];
                  $fname2 = $split_fullname[0];
                } else {
                  $fname1 = $split_fullname[0];
                  $fname2 = $split_fullname[1];
                }
                $status = mailFunction($email, $subject, $body, $replyer);
                $issuedBy = $_SESSION['sur_name']. " " . $_SESSION['first_name'];

                if ($status == true) {
                  //here data is sent to database !
                  $query3 = "
                  UPDATE product_issued SET product_name_issued='$product_name', product_decription_issued='$description', product_quantity_issued='$quantity', product_price_per_each_issued='$unitprice', Amount_Paid='$deposited', product_serial_number_issued='$serialnumber', product_issued_by='$issuedBy', product_time_issued='$joindate_time', product_issued_to='$fullname', surname='$fname1', othername='$fname2', product_receivers_phone_number='$phonenumber', product_receivers_email='$client_email', product_receivers_address='$homeaddress', LPO_NO='$lpo_no' WHERE id = '$id' AND receipt_number =  '$receipt_number'";

                  $queryrun3 = mysqli_query($conn, $query3);

                  if ($queryrun3 == true) {
                     header("location:search.php?invoiceeditsuccess4112244333222=111333444invoiceeditfsdfsdfsdsuccess444333222&invoiceeditnum12sdsdsd34432112344321=$receipt_number");
                  } else {
                     $alertError = "Sorry, We could not Query the Database !";   ;
                  }
                } else {
                    $alertError = "Sorry, Communication to $email was not Successful, Check your Internet Connection !";
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
    <h3><u><center><b>Editing an Existing Payment Invoice.<br><?php if(isset($product_issued_to)) { echo $product_issued_to; } ?> <br> Invoice ID: <?php if(isset($receipt_number)){ echo $receipt_number; } ?> </b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="edit_invoice.php?editdata55554444333322221111=editdata11112222333344445555&id=<?php echo$_GET['id'];?>&receipt_number=<?php echo$_GET['receipt_number'];?>" autocomplete="on">

        <p class="jumbotron">
          <label>Product/Service Name: (Required)</label>
          <input type="text" name="product_name" required="" placeholder="Enter Product Name" class="form-control" value="<?php if(isset($_POST['product_name'])) {echo $_POST['product_name']; } else if(isset($product_name_issued)){echo $product_name_issued;} ?>" > <br><span style="color: red;"><i> <?php echo $product_nameErr;  ?> </i></span>
        </p>

         <p class="jumbotron">
          <label>Description: (Required)</label>
          <input type="text" name="description" required="" style="height: 70px;" placeholder="Provide Detailed Description" class="form-control text-center" value="<?php if(isset($_POST['description'])) {echo $_POST['description']; } else if(isset($product_decription_issued)){echo $product_decription_issued;} ?>" > <br><span style="color: red;"><i> <?php echo $descriptionErr;  ?> </i></span>
        </p>
           
         <p class="jumbotron">
          <label>Quantity to be Issued: (Required)</label>
          <input type="number" required="" name="quantity" placeholder="Enter Quantity in Numbers Only" class="form-control" value="<?php if(isset($_POST['quantity'])) {echo $_POST['quantity']; } else if(isset($product_quantity_issued)){echo $product_quantity_issued;} ?>" > <br><span style="color: red;"><i> <?php echo $quantityErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Product Price per Unit: (Required)</label>
          <input type="number" required="" name="unitprice" placeholder="Enter the Product Price for one Unit" class="form-control" value="<?php if(isset($_POST['unitprice'])) {echo $_POST['unitprice']; } else if(isset($product_price_per_each_issued)){echo $product_price_per_each_issued;} ?>" > <br><span style="color: red;"><i> <?php echo $unitpriceErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Total Amount Deposited by Client: (Required)</label>
          <input type="number" required="" name="deposited" placeholder="Enter the Amount Received" class="form-control" value="<?php if(isset($_POST['deposited'])) {echo $_POST['deposited']; } else if(isset($Amount_Paid)){echo $Amount_Paid;} ?>" > <br><span style="color: red;"><i> <?php echo $depositedErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Product Unique Serial Number: (Optional)</label>
          <input type="text" name="serialnumber" placeholder="Enter the Product Unique Serial Number" class="form-control" value="<?php if(isset($_POST['serialnumber'])) {echo $_POST['serialnumber']; } else if(isset($product_serial_number_issued)){echo $product_serial_number_issued;} ?>" > <br><span style="color: red;"><i> <?php echo $serialnumberErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Client's Full Name: (Required)</label>
          <input type="text" name="fullname" required="" placeholder="Enter the Customers Full Name" class="form-control" value="<?php if(isset($_POST['fullname'])) {echo $_POST['fullname']; } else if(isset($product_issued_to)){echo $product_issued_to;} ?>" > <br><span style="color: red;"><i> <?php echo $fullnameErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Client's Phone Number: (Optional)</label>
          <input type="tel" name="phonenumber" minlength="11" maxlength="11" placeholder="Enter the Customers Mobile Phone Number" class="form-control" value="<?php if(isset($_POST['phonenumber'])) {echo $_POST['phonenumber']; } else if(isset($product_receivers_phone_number)){echo $product_receivers_phone_number;} ?>" > <br><span style="color: red;"><i> <?php echo $phonenumberErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>Client's Email Address: (Optional)</label>
          <input type="email" name="email" placeholder="Enter Clients Email Address" class="form-control" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } else if(isset($product_receivers_email)){echo $product_receivers_email;} ?>" > <br><span style="color: red;"><i> <?php echo $emailErr;  ?> </i></span>
        </p>

        <p class="jumbotron">
          <label>L.P.O No. : (Optional)</label>
          <input type="text" name="lpo_no" placeholder="Enter L.P.O Number if available" class="form-control text-center" value="<?php if(isset($_POST['lpo_no'])) {echo $_POST['lpo_no']; } else if(isset($lpo_no_collect)){echo $lpo_no_collect;} ?>" > <br><span style="color: red;"><i> <?php echo $lpo_noErr;  ?> </i></span>
        </p>
        
        <p class="jumbotron">
          <label>Client's Home Address: (Optional)</label>
          <input type="text" name="homeaddress" placeholder="Enter Clients Home Address" style="height: 70px;" class="form-control text-center" value="<?php if(isset($_POST['homeaddress'])) {echo $_POST['homeaddress']; } else if(isset($product_receivers_address)){echo $product_receivers_address;} ?>" > <br><span style="color: red;"><i> <?php echo $homeaddressErr;  ?> </i></span>
        </p>

        
        <p><center>
          <input type="submit" name="submit" value="Update Invoice" class="form-control">
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