
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     adminMaster();
    include "navigation.php";
    $searchErr = ""; $searchSuccess = "";
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
	 //search analyser
	$query1 = "SELECT * FROM product_issued ORDER BY `id` DESC";
	$query_run1 = mysqli_query($conn, $query1);
	if ($query_run1 == true) {
		$row_counter = mysqli_num_rows($query_run1);
		if ($row_counter > 0) {
			$searchSuccesscontain = "";
			$sn = 0;
			while ($rows = mysqli_fetch_assoc($query_run1)) {
				$sn = $sn + 1;
			$id = $rows['id'];
			$receipt_number = $rows['receipt_number'];
			$product_name_issued = $rows['product_name_issued'];
			$product_decription_issued = $rows['product_decription_issued'];
			$product_quantity_issued = $rows['product_quantity_issued'];
			$product_price_per_each_issued = $rows['product_price_per_each_issued'];
			$Amount_due =  intval($product_price_per_each_issued) *  intval($product_quantity_issued);
			$Amount_Paid = $rows['Amount_Paid'];
			$balance_left =  intval($Amount_due) -  intval($Amount_Paid);
			$product_serial_number_issued = $rows['product_serial_number_issued'];
			$product_issued_by = $rows['product_issued_by'];
			$product_time_issued = $rows['product_time_issued'];
			$product_issued_to = $rows['product_issued_to'];
			$product_receivers_phone_number = $rows['product_receivers_phone_number'];
			$product_receivers_email = $rows['product_receivers_email'];
			$lpo_no = $rows['LPO_NO'];
			$product_receivers_address = $rows['product_receivers_address'];
		
			
			//print out
			$searchSuccesscontain .= "
			<tr>
				<td>
					$sn)
				</td>
				<td>
					$receipt_number	
				</td>
				<td>
					$lpo_no	
				</td>
				<td>
					$product_name_issued
				</td>
				<td>
					$product_price_per_each_issued
				</td>
				<td>
					$product_quantity_issued
				</td>
				<td>
					$Amount_due
				</td>
				<td>
					$Amount_Paid
				</td>
				<td>
					$balance_left
				</td>
				<td>
					$product_issued_to
				</td>
				<td>
					$product_issued_by
				</td>
				<td>
					$product_time_issued
				</td>
			</tr>";


		}
		$searchSuccess = $searchSuccesscontain;
		} else {
			$searchErr = "It Seems no Transaction History has been Stored on the Database !.";
		}
	} else {
		$searchErr = "Sorry, We could not Query the Server !.";
	}

 if ($searchErr != '') { echo "<p class='alert alert-danger text-center'> $searchErr <hr></p>"; $searchErr = '';}

if ($searchSuccess != '') { echo "<b style=' font-size: 20px; margin: auto; color: red; text-align: center;'>NOTE: Most Recent Transactions Appears at the Top.</b><hr>
	<button><a href='admins&mastertools.php'><span class='glyphicon glyphicon-arrow-left'></span> Back </a></button><br><br>
 <p class='text-left' style=' font-size: 19px; margin: auto; width: 95%; '>
<table border='1' width='100%'; style='background: lightblue;'> 
<tr style='text-align: center;'>
	<td>
	<b>S/N</b>
	</td>
	<td>
	<b>Invoice ID</b>
	</td>
	<td>
	<b>L.P.O No.</b>
	</td>
	<td>
	<b>Product Name</b>
	</td>
	<td>
	<b>Unit Price</b>
	</td>
	<td>
	<b>Quantity</b>
	</td>
	<td>
	<b>Amount Due</b>
	</td>
	<td>
	<b>Amount Paid</b>
	</td>
	<td>
	<b>Balance</b>
	</td>
	<td>
	<b>Issued To</b>
	</td>
	<td>
	<b>Issued By</b>
	</td>
	<td>
	<b>Data & Time</b>
	</td>
</tr>
$searchSuccess </table></p><br><button><a href='admins&mastertools.php'><span class='glyphicon glyphicon-arrow-left'></span> Back </a></button><hr>"; $searchSuccess = '';}
?>


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
?>