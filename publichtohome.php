
<?php 
ob_start();
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
	     adminMaster();
    include "navigation.php";
  
//success and error variable.
 $searchSuccess = ""; $searchSuc = ""; $searchErr = "";
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
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->
<ul class='jumbotron text-left' style='list-style: none; line-height: 30px; font-size: 17px;'>


<?php
	if ($_SESSION['rank'] == '3') {
		echo "
		<p style='width: 100%; text-align: center;'><b><u>Homepage Sliding Contents!</u></b></p><br>
    <hr>
  <button><a href='admins&mastertools.php'><span class='glyphicon glyphicon-arrow-left'></span> Back </a></button><br><br>
  	<p><li><a href='image_to_home_screen.php'><span class='fa fa-file-picture-o'></span> Add Sliding Image to Homepage </a></li></p>
    <p><li><a href='text_to_home_screen.php'><span class='glyphicon glyphicon-text-background'></span> Add Notification/Static Text to Home Screen </a></li></p>
    <p><li><a href='edit_delete_home_screen.php'><span class='glyphicon glyphicon-remove'></span> Remove/Edit Homepage Sliding/Static Content</a></li></p>

  <br><button><a href='admins&mastertools.php'><span class='glyphicon glyphicon-arrow-left'></span> Back </a></button><br><hr>
    ";

	} else {
		die("You are Denied Access to this Page!");
	}
?>


</ul>
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