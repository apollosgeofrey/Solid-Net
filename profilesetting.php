

<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "sessionchecker.php";
    include "navigation.php";
 ?>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
<br><br>
    <div class="col-sm-10 text-left" id="content"><b> 
<!-- This is here i will always add my contents !!!-->
<ul>
<li class='jumbotron text-center'><a href='myProfile.php'><span class='glyphicon glyphicon-info-sign'></span> My Profile Information</a></li> 
<li class='jumbotron text-center'><a href='editProfileData.php'><span class='glyphicon glyphicon-pencil'></span> Edit My Profile Data</a></li>
<li class='jumbotron text-center'><a href='changeMyPasscode.php'><span class='fa fa-key'></span> Change My Password</a></li>  
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