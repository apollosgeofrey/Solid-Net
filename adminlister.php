
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     adminMaster();
    include "navigation.php";
  
//success and error variable.
 $searchSuccess = ""; $searchSuc = ""; $searchErr = "";

//deleter script
if (isset($_GET['deletedataadminlister11112222333344445555']) && isset($_GET['id']) && isset($_GET['email_address'])) {
	if ($_GET['deletedataadminlister11112222333344445555'] == "deletedataadminlister55554444333322221111" && !empty($_GET['id']) && !empty($_GET['email_address'])) {
		$iddis = $_GET['id'];
		$email_addressdis = $_GET['email_address'];
		$query_dis = "DELETE FROM users_admin WHERE users_admin.id = $iddis AND email_address = '$email_addressdis'";
		$query_dis_run = mysqli_query($conn, $query_dis);
		if ($query_dis_run == true) {
			$searchSuc = "Successfully, <u>$email_addressdis</u> Account was Deleted.";
		} else {
			$searchErr = "Sorry, We Encountered a problem Deleting <u>$email_addressdis</u> Account.";
		}
	}
}


//disable script
if (isset($_GET['disablenow55554444333322221111']) && isset($_GET['id']) && isset($_GET['email_address'])) {
	if ($_GET['disablenow55554444333322221111'] == "disablenow11112222333344445555" && !empty($_GET['id']) && !empty($_GET['email_address'])) {
		$iddis = $_GET['id'];
		$email_addressdis = $_GET['email_address'];
		$query_dis = "UPDATE users_admin SET activation_status = '0' WHERE users_admin.id = $iddis AND email_address = '$email_addressdis'";
		$query_dis_run = mysqli_query($conn, $query_dis);
		if ($query_dis_run == true) {
			$searchSuc = "Successfully, <u>$email_addressdis</u> Account was Disabled.";
		} else {
			$searchErr = "Sorry, We Encountered a problem Disabling <u>$email_addressdis</u> Account.";
		}
	}
}

//enable script
if (isset($_GET['enablenow55554343444333322221111']) && isset($_GET['id']) && isset($_GET['email_address'])) {
	if ($_GET['enablenow55554343444333322221111'] == "enablenow11112222232333344445555" && !empty($_GET['id']) && !empty($_GET['email_address'])) {
		$iddis = $_GET['id'];
		$email_addressdis = $_GET['email_address'];
		$query_dis = "UPDATE users_admin SET activation_status = '1' WHERE users_admin.id = $iddis AND email_address = '$email_addressdis'";
		$query_dis_run = mysqli_query($conn, $query_dis);
		if ($query_dis_run == true) {
			$searchSuc = "Successfully, <u>$email_addressdis</u> Account was Enabled.";
		} else {
			$searchErr = "Sorry, We Encountered a problem Enabling <u>$email_addressdis</u> Account.";
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
	 //search analyser
	$query1 = "SELECT * FROM users_admin ORDER BY `id` DESC";
	$query_run1 = mysqli_query($conn, $query1);
	if ($query_run1 == true && mysqli_num_rows($query_run1) >= 1) {
		$row_counter = mysqli_num_rows($query_run1);
		if ($row_counter > 0) {
			$searchSuccesscontain = "";
			while ($rows = mysqli_fetch_assoc($query_run1)) {
			$id = $rows['id'];
			$sur_name = $rows['sur_name'];
			$first_name = $rows['first_name'];
			$email_address = $rows['email_address'];
			$phone_numebr = $rows['phone_numebr'];
			$activation_status = $rows['activation_status'];
			$rank = $rows['rank'];
			$date_time_reg = $rows['date_time_reg'];
		
			if ($email_address == $_SESSION['email']) {
				continue;
			}

		
			$buttonverify = "<br><button class='btn btn-default'><a href='adminlister.php?deletedataadminlister11112222333344445555=deletedataadminlister55554444333322221111&id=$id&email_address=$email_address'><span class='glyphicon glyphicon-trash'></span> Delete this Account !. </a></button>";

			 if ($activation_status == '1') {
			 	$buttonverify .= "<button class='btn btn-default'><a href='adminlister.php?disablenow55554444333322221111=disablenow11112222333344445555&id=$id&email_address=$email_address'><span class='glyphicon glyphicon-remove'></span> Disable This Account !. </a></button>"; 
			 }
			 if ($activation_status != '1') {
			 	$buttonverify .= "<button class='btn btn-default'><a href='adminlister.php?enablenow55554343444333322221111=enablenow11112222232333344445555&id=$id&email_address=$email_address'><span class='fa fa-check'></span> Enable This Account !. </a></button>";
			 }
			
			if ($rank == '1') {
				$rank = "Level 2 (Can Search, Sale Products and generate new Invoice)";
			} else if ($rank == '3') {
				$rank = "Level 3 (Can Search, Sale, generate new Invoice and also add a new Admin/User)";
			} else {
				$rank = "Level 1 (Can Only Search for an Invoice)";
			}

			if ($activation_status == '1') {
				$activation_status = "Account is Activated and Enabled";
			} else {
				$activation_status = "Account is Not Activated and is Disabled";
			}

			//print out
			$searchSuccesscontain .= "<b>Full Name: </b><i> &nbsp &nbsp  $sur_name $first_name. </i><br>
				<b>Email Address: </b><i> &nbsp &nbsp $email_address. </i> <br>
				<b>Mobile Phone Number: </b><i> &nbsp &nbsp $phone_numebr. </i> <br>
				<b>Account Type/Level: </b><i> &nbsp &nbsp $rank. </i><br>
				<b>Date and Time Registered: </b><i> &nbsp &nbsp N $date_time_reg </i><br>
				<b>Account Activation Status: </b><i> &nbsp &nbsp $activation_status. </i>
				$buttonverify<br><br><br>";


		}
		$searchSuccess = $searchSuccesscontain;
		} else {
			$searchErr = "It Seems no Account is Registered !.";
		}
	} else {
		$searchErr = "Sorry, We could not Query the Server !.";
	}

 if ($searchErr != '') { echo "<p class='alert alert-danger text-center'> $searchErr <hr></p>"; $searchErr = '';}
 if ($searchSuc != '') { echo "<p class='alert alert-success text-center'> $searchSuc <hr></p>"; $searchSuc = '';}

if ($searchSuccess != '') { echo "<hr> <p class='text-left' style=' font-size: 18px; margin: auto; width: 90%; '>  $searchSuccess </p><hr>"; $searchSuccess = '';}
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