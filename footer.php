

<div id="footer" class="col-sm-12">
<footer class="container-fluid text-center">
	<hr>
	<b><font color ="darkgreen"><u> Office Address: <span class="fa fa-map-marker"></span></u></font></b> <i> M3, Asokoro Modern Market,  Mogadishu Cantonment, Asokoro District, Abuja.</i> <br>
	<i>  &nbsp &nbsp <a href="tel:+2348031372878"><span class="fa fa-phone"></span> +234 803 137 2878 </a>,
	&nbsp &nbsp <a href=" https://wa.me/+2348031372878?text=Good Day. I got this Whatsapp Number from Solidnet Multi-Vision Services Limited Official Website and would like to make some enquiries." target="__ new"><span class="fa fa-whatsapp"></span> +234 803 137 2878 </a><br><a href="mailto: <?php echo $email; ?>; solidnetservicesltd@gmail.com?subject=I got this address from the Company offical Website. & body = I will like to make some enquiries." target="__ new">  <span class="fa fa-envelope"></span> solidnetservicesltd@gmail.com </a>

	 </i>
	<hr>
  &copy 2020 - 
<?php 
$year =  Date('Y'); 

if($year == 2020){
echo "Present!!!...";} else {
echo $year;}
?> 
<br><i><a href="#http://www.solidnetservices.com.ng" ><span class="fa fa-signal" target="__ new" ></span> www.solidnetservices.com.ng</i></a>
<?php
	if (isset($_SESSION['email'])) {
		if ($_SESSION['rank'] == '1' || $_SESSION['rank'] == '3'){
	      $ranker = "Admin";
	    } else {
	      $ranker = "User";
	    }
		 echo "<div style='color: darkgreen;'>
        <font size='4px'><b><i>" .$ranker. ": <b><u>". $_SESSION['email'] ."</u> </b> is Active</i> (<span class='fa fa-laptop'></span>)(<span class='fa fa-check'></span>) </b></font>
      </div>";
	}
	mysqli_close($conn);
?>
</footer>
</div>

</body>
</html>
