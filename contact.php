
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "navigation.php";
?>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->
  
  <p>
     <p class="jumbotron"> <b><span class="glyphicon glyphicon-website"></span> Official Website: </b><i><a href="http://www.solidnetservices.com.ng" target="__ new"><u> <span class="glyphicon glyphicon-signal"></span> www.solidnetservices.com.ng</u></a></i></p>
     <p class="jumbotron"> <b> Email:</b> <i> <a href="mailto: <?php echo $email; ?>; solidnetservicesltd@gmail.com?subject=I got this address from the Company offical Website. & body = I will like to make some enquiries." target="__ new">  <span class="fa fa-envelope"></span> solidnetservicesltd@gmail.com </a> </i></p>
     <p class="jumbotron"> <b> Whatsapp Number:</b> <i> <a href="https://wa.me/+2348031372878?text=Good Day. I got this Whatsapp Number from Solidnet Multi-Vision Services Limited Official Website and would like to make some enquiries." target="__ new"> <span class="fa fa-whatsapp"></span> +2348031372878 </a> </i></p>
     <p class="jumbotron"><b> Head Office Address:</b> &nbsp <a><span class="fa fa-map"></span> &nbsp &nbsp M3, Asokoro Modern Market,  Mogadishu Cantonment, Asokoro District, Abuja.</a></p>
     <p class="jumbotron"> <b> Care Line 1:</b> <i> <a href="tel:+2348031372878"><span class="glyphicon glyphicon-phone"></span> 0092348031372878 </a> </i></p>
     <p class="jumbotron"> <b> Care Line 2:</b> <i> <a href="tel:+2348106053732"><span class="glyphicon glyphicon-phone"></span> 0092348106053732 </a> </i></p>
  </p>
<!-- End of Content -->
    </div>
  </div>
    <!-- <div class="col-sm-1 sidenav">
     <?php
     // here is the included ads page
       // include "ads.php";
      ?>
    </div> -->

  </div>
</div>

<br>
<?php
// here is the included footer
include "footer.php";
?>