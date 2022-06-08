
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     generalAdminMaster();
    include "navigation.php";
 ?>
<style type="text/css">
  ul li:hover{font-size: 18px; background: lightblue; color: white;}
</style>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
<br><br>
    <div class="col-sm-10 text-left" id="content"><b> 
<!-- This is here i will always add my contents !!!-->
<ul class='jumbotron text-left' style="list-style: none; line-height: 30px; font-size: 17px;">
  <p style="width: 100%; text-align: center;"><b><u>Admin Dashboard!</u></b></p><br>
<p><li><a href='search.php'><span class='glyphicon glyphicon-search'></span> Search Payment Invoice</a></li></p>
<p><li><a href='newinvoice.php'><span class='glyphicon glyphicon-pencil'></span> New Payment Invoice</a></li></p>
<p><li><a href='search.php?invoiceditsuccess4112244333222showmwssage=111333444invoiceeditfsdfsdfsdsuccessshowmessage444333222'><span class='glyphicon glyphicon-edit'></span> Update Existing Payment Invoice</a></li></p> 
<?php
	if ($_SESSION['rank'] == '3') {
		echo "
		<p><li><a href='transactiondetails.php'><span class='glyphicon glyphicon-list'></span> View Recent Transactions</a></li></p>
    <p><li><a href='selectproducttochange.php'><span class='glyphicon glyphicon-edit'></span> Update an Existing Product </a></li></p>
    <p><li><a href='addnewtostore.php'><span class='glyphicon glyphicon-plus'></span> Add New Product to the Store </a></li></p>
    <p><li><a href='adminlister.php'><span class='glyphicon glyphicon-list'></span> List of <u>Registered</u> Administrators/Users</a></li></p>
		<p><li><a href='adminadder.php'><span class='glyphicon glyphicon-plus'></span> Sign-Up a New Administrator</a></li></p>
    <p><li><a href='publichtohome.php'><span class='glyphicon glyphicon-wrench'></span> Homepage Sliding Content</a></li></p>";
	}
?>

</ul>
<!-- End of Content -->
  </b> </div>

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