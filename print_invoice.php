
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
    include "navigation.php";
  
//search error variable.
$searchErr = ""; $searchSuccess = ""; $searchSuc = ""; $row_counter = "";



//search analyser
if (isset($_GET['printout11112222333344445555']) && isset($_GET['id']) && isset($_GET['receipt_number'])) {
	if ($_GET['printout11112222333344445555'] == 'printout55554444333322221111' && !empty($_GET['id']) && !empty(['receipt_number'])) {
		$idgeter = $_GET['id'];
		$receipt_numbergeter = $_GET['receipt_number'];
		$query1 = "SELECT * FROM product_issued WHERE '$idgeter' = id AND '$receipt_numbergeter' = receipt_number ORDER BY `id` DESC";
		$query_run1 = mysqli_query($conn, $query1);
		if ($query_run1 == true && mysqli_num_rows($query_run1) == 1) {
			while ($rows = mysqli_fetch_assoc($query_run1)) {
			$id = $rows['id'];
			$receipt_number = $rows['receipt_number'];
			$product_name_issued = $rows['product_name_issued'];
			$product_decription_issued = $rows['product_decription_issued'];
			$product_quantity_issued = $rows['product_quantity_issued'];
			$Amount_Due = intval($rows['product_price_per_each_issued']) * intval($product_quantity_issued);
			$Amount_Paid = $rows['Amount_Paid'];
			$Amount_Paid_int = floatval($Amount_Paid);
			$balance_left = intval($Amount_Due) - intval($Amount_Paid);
			$product_serial_number_issued = $rows['product_serial_number_issued'];
			$product_issued_by = $rows['product_issued_by'];
			$product_time_issued = $rows['product_time_issued'];
			$product_issued_to = $rows['product_issued_to'];
			$product_receivers_phone_number = $rows['product_receivers_phone_number'];
			$product_receivers_email = $rows['product_receivers_email'];
			$product_receivers_address = $rows['product_receivers_address'];
			$lpo_no = $rows['LPO_NO'];
			}
		} else {
			$searchErr = "Sorry, We not fetch Data from the Database !.";
		}
	} else {
		die("<br><hr><hr>You are denied Access to this Page !.<hr><hr>");
	}
} else {
	die("<br><hr><hr>You are denied Access to this Page !.<hr><hr>");
}
?>

<!--print structure-->
<style type="text/css">
	table tr td u{
		font-size: 12px;
	}
	#awords{color: blue;}
	th{
		color: blue;
		background: lightblue;
	}
	#tablelast{
			color: red; background: lightblue; height: 30px;
		}
</style>
<style type="text/css" media="print">
		body{
			-webkit-print-color-adjust: exact !important; 
		}
		#link, #printButton, #footer, .navbar-default-top{
			display: none;
		}
		img {
		  width: 100%; height: 100px;
		}
		#table2{
			width: 50%;
			font-size: 11px;
			background: white;
		}
		#awords{font-size: 11px; color: blue !important;}
		table tr td u i{
			font-size: 9px
		}
		table tr td b{
			color: blue !important;
		}
		th{
			color: blue  !important;
			background: lightblue  !important;
		}
		p{
			color: red !important;
		}
		#tablelast{
			background-color: lightblue !important; height: 30px;
		}
		#tablelast b i{
			color: red !important;
		}
		#awords_val{
			font-size: 9px;
		}
</style>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
<br><br>
    <div class="col-sm-10 text-left" id="content" style="background: white;"> 
<!-- This is here i will always add my contents !!!-->

		<!-- The image header -->
		<p><img src="Server_Pics/headerpicsnew.jpg" width="100%" height="200px" style="background: white;"></p>

		<!-- this shows the date and time -->
	<table border="1" style="background: white; border: 1px solid blue; float: right; height: auto; width: 40%;" id="table2">
		<tr>
			<td>
				<b style="color: blue;">Date/Time:&nbsp &nbsp</b><u><i><?php echo $product_time_issued; ?></i></u><br>
			</td>
		</tr>
		<tr>
			<td>
				<b style="color: blue;">Receipt No:&nbsp &nbsp</b><u><i><?php echo $receipt_number; ?></i></u><br>
			</td>
		</tr>
		<tr>
			<td>
				<b style="color: blue;">L.P.O NO:&nbsp &nbsp</b><u><i><?php echo $lpo_no; ?></i></u><br>
			</td>
		</tr>
	</table>


		<!-- the name, email and phone files -->
		<table border="1" style="background: white; border: 1px solid blue; float: left height: auto; width: 50%;" id="table2">
		<tr>
			<td>
				<b style="color: blue;">Client's Fullname:&nbsp &nbsp</b><u><i><?php echo $product_issued_to; ?></i></u><br>
			</td>
		</tr>
		<tr>
			<td>
				<b style="color: blue;">Client's Phone:</b>&nbsp &nbsp</b><u><i><?php echo $product_receivers_phone_number; ?></i></u><br>
			</td>
		</tr>
		<tr>
			<td>
			<b style="color: blue;">Client's Email:</b>&nbsp &nbsp</b><u><i><?php echo $product_receivers_email; ?></i></u><br>
			</td>
		</tr>
	</table>

	<!-- Detail transaction -->
	<p><table border="1" style="background: white; border: 1px solid blue; float: left height: auto; width: 100%;" id="table2">
		<tr>
			<th class="text-center" style="width: 40%;">
				Product Name & Description
			</th>
			<th class="text-center" style="width: 12%;">
				Quantity
			</th>
			<th class="text-center" style="width: 16%;">
				Amount Due
			</th>
			<th class="text-center" style="width: 16%;">
				Amount Paid
			</th>
			<th class="text-center" style="width: 16%;">
				Balance
			</th>
		</tr>
		<tr>
			<td>
				<br><br><p class="text-center"><?php echo "<b>".$product_name_issued."</b>"; ?> </p> <br> <p class="text-center"> <?php echo $product_decription_issued; ?> </p><br><br><br><br>
			</td>
			<td>
				<p class="text-center"><?php echo $product_quantity_issued; ?> </p>
			</td>
			<td>
				<p class="text-center"><?php echo "N " . $Amount_Due . ".00 <u>only</u>"; ?> </p>
			</td>
			<td>
				<p class="text-center"><?php echo "N " . $Amount_Paid . ".00 <u>only</u>"; ?> </p>
			</td>
			<td>
				<p class="text-center"><?php echo "N " . $balance_left . ".00 <u>only</u>"; ?> </p>
			</td>
		</tr>
	</table></p><br>

<b id="awords">Amount Deposited In Words:</b><i><u id="awords_val">&nbsp &nbsp <?php $wordscollect = numberTowords($Amount_Paid_int). " Naira Only."; echo $wordscollect; ?> &nbsp &nbsp </u></i>
<br><br>
<table style="background: white; float: left; border: 1px solid blue; height: auto; width: 100%;" id="table2">
		<tr>
			<td colspan="2">
				<b style="color: blue;">Client's Address:</b>&nbsp &nbsp</b><u><i><?php echo $product_receivers_address; ?></i></u><br>
			</td>
		</tr>
		<tr>
			<td><br>
				<b style="color: blue;">Client's Signature:</b>&nbsp &nbsp</b><u><i><?php echo "______ _______"; ?></i></u><br>
			</td>
			<td><br>
				<b style="color: blue;">Manager's Signature:</b>&nbsp &nbsp</b><u><i><?php echo "______ _______"; ?></i></u><br>
			</td>
		</tr>
	</table><br><br><br>

<!-- appreciation -->
<p>
<table style="background: white; margin: auto; height: auto; width: 100%;">
		<tr>
			<td>
				<p class="block-center text-center" id="tablelast"><b><i>Thanks for your Patronage!</i></b></p><br>
			</td>
		</tr>
</table>
</p>

	<p><br><button onclick="window.print();" id="printButton" class="form-control"><span class="glyphicon glyphicon-print"></span> Print a Copy</button></p>
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