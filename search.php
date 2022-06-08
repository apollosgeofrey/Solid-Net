
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
    include "navigation.php";
  
//search error variable.
$searchErr = ""; $searchSuccess = ""; $searchSuc = ""; $row_counter = ""; $invoiceId = ""; $invoiceSuc = "";

//from new invoice to search and print
if (isset($_GET['invoicesuccess444333222']) && isset($_GET['invoicenum1234432112344321'])) {
	if ($_GET['invoicesuccess444333222'] == "111333444invoicesuccess444333222") {
		$invoiceId = $_GET['invoicenum1234432112344321'];
		$invoiceSuc = "The Payment Invoice with the ID { $invoiceId } has been Successfully Created and Submitted. Click on the <font color='red'>Search Now!</font> Button to View and Print Out a Copy. ";
	}
}

//return from ediited invoice to search and print\
if (isset($_GET['invoiceeditsuccess4112244333222']) && isset($_GET['invoiceeditnum12sdsdsd34432112344321'])) {
	if ($_GET['invoiceeditsuccess4112244333222'] == "111333444invoiceeditfsdfsdfsdsuccess444333222") {
		$invoiceId2 = $_GET['invoiceeditnum12sdsdsd34432112344321'];
		$invoiceSuc = "The Payment Invoice with the ID { $invoiceId2 } has been Successfully Editted and Submitted. Click on the <font color='red'>Search Now!</font> Button to View and Print Out a Copy. ";
	}
}

//from hokeup from update page invoice to search and print\
if (isset($_GET['invoiceditsuccess4112244333222showmwssage'])) {
	if ($_GET['invoiceditsuccess4112244333222showmwssage'] == "111333444invoiceeditfsdfsdfsdsuccessshowmessage444333222") {
		$invoiceSuc = "Enter Payment Invoice ID, Or Client's Name to search and Editted an Invoice below. Click on <font color='red'>Search Now!</font>. ";
	}
}

//deleter script
if (isset($_GET['deletedata']) && isset($_GET['id']) && isset($_GET['receipt_number'])) {
		if ($_GET['deletedata'] == 'deletedata' && !empty($_GET['id']) && !empty($_GET['receipt_number'])) {
		$idget = $_GET['id'];
		$receipt_number_get = $_GET['receipt_number'];
		$queryver1 = "DELETE FROM `product_issued` WHERE `product_issued`.`id` = '$idget' AND `product_issued`.`receipt_number` = '$receipt_number_get'";
		$queryrunver1 =  mysqli_query($conn, $queryver1);
		if ($queryrunver1 == true) {
			$searchSuc = "<b>The Invoice <u>$receipt_number_get</u> was Successfully Deleted.</b>";
		} else {
			$searchErr = "Sorry, Couldn't Query The Database !!!.";
		}
	}
}


//search analyser
if (isset($_GET['search'])) {
	$searchval = trim(htmlentities(ucwords(mysqli_escape_string($conn, stripslashes($_GET['searchfield'])))));
if ($searchval != null && !empty($searchval)) {
	$query1 = "SELECT * FROM product_issued WHERE receipt_number LIKE '%$searchval%' or product_issued_to LIKE '%$searchval%' or surname LIKE '%$searchval%' or othername LIKE '%$searchval%' ORDER BY `id` DESC";
	$query_run1 = mysqli_query($conn, $query1);
	if ($query_run1 == true) {
		$row_counter = mysqli_num_rows($query_run1);
		if ($row_counter > 0) {
			$searchSuccesscontain = "";
			while ($rows = mysqli_fetch_assoc($query_run1)) {
			$id = $rows['id'];
			$receipt_number = $rows['receipt_number'];
			$product_name_issued = $rows['product_name_issued'];
			$product_decription_issued = $rows['product_decription_issued'];
			$product_quantity_issued = $rows['product_quantity_issued'];
			$product_price_per_each_issued = intval($rows['product_price_per_each_issued']) * intval($product_quantity_issued);
			$Amount_Paid = $rows['Amount_Paid'];
			$balance_left = $product_price_per_each_issued - $Amount_Paid;
			$product_serial_number_issued = $rows['product_serial_number_issued'];
			$product_issued_by = $rows['product_issued_by'];
			$product_time_issued = $rows['product_time_issued'];
			$product_issued_to = $rows['product_issued_to'];
			$product_receivers_phone_number = $rows['product_receivers_phone_number'];
			$product_receivers_email = $rows['product_receivers_email'];
			$product_receivers_address = $rows['product_receivers_address'];
			$lpo_no = $rows['LPO_NO'];

		
			$buttonverify = "<br><button class='btn btn-default'><a href='print_invoice.php?printout11112222333344445555=printout55554444333322221111&id=$id&receipt_number=$receipt_number'><span class='glyphicon glyphicon-print'></span> Preview/Print this Invoice !. </a></button>";
			 if ($_SESSION['rank'] == '1' | $_SESSION['rank'] == '3') {
			 	$buttonverify .= "<button class='btn btn-default'><a href='edit_invoice.php?editdata55554444333322221111=editdata11112222333344445555&id=$id&receipt_number=$receipt_number'><span class='glyphicon glyphicon-edit'></span> Edit this Invoice !. </a></button>"; 
			 }
			 if ($_SESSION['rank'] == '3') {
			 	$buttonverify .= "<button class='btn btn-default'><a href='search.php?deletedata=deletedata&id=$id&receipt_number=$receipt_number'><span class='glyphicon glyphicon-remove'></span> Delete this Invoice !. </a></button>";
			 }
			

			//print out
			$searchSuccesscontain .= "<b>Invoice Number: </b><i> &nbsp &nbsp $receipt_number. </i><br>
				<b>Name of Products/Services Offered: </b><i> &nbsp &nbsp $product_name_issued. </i> <br>
				<b>Description of Products/Services: </b><i> &nbsp &nbsp $product_decription_issued. </i> <br>
				<b>Quantity: </b><i> &nbsp &nbsp $product_quantity_issued. </i><br>
				<b>Total Amount Due: </b><i> &nbsp &nbspN $product_price_per_each_issued.00 </i><br>
				<b>Total Amount Paid: </b><i> &nbsp &nbspN $Amount_Paid.00 </i><br>
				<b>Balance Left: </b><i> &nbsp &nbspN $balance_left.00 </i><br>
				<b>Products Serial Number: </b><i> &nbsp &nbsp $product_serial_number_issued. </i><br>
				<b>Product/Service Offered by: </b><i> &nbsp &nbsp $product_issued_by. </i><br>
				<b>Product/Service was Issued: </b><i> &nbsp &nbsp $product_time_issued. </i><br>
				<b>Customer's Full Name: </b><i> &nbsp &nbsp $product_issued_to. </i><br>
				<b>Customer's Mobile Number: </b><i> &nbsp &nbsp $product_receivers_phone_number. </i><br>
				<b>Customer's Email Address: </b><i> &nbsp &nbsp $product_receivers_email . </i><br>
				<b>L.P.O. NO : </b><i> &nbsp &nbsp $lpo_no . </i><br>
				<b>Customer's Home Address: </b><i> &nbsp &nbsp $product_receivers_address. </i>
				$buttonverify<br><br><br>";


		}
		$searchSuccess = $searchSuccesscontain;
		} else {
			$searchErr = "No Result Found for { $searchval };";
		}
	} else {
		$searchErr = "Sorry, We could not Query the Server !.";
	}
} else {
 $searchErr = "Enter a Valid Input to Search !. ";
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
	 include "searchfield.php";
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