
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
  <?php
  
 if (isset($_SESSION['email']) == true){
    $qst = "SELECT * FROM `visitedmembers` ORDER BY id DESC";
    $r_qst = mysqli_query($conn, $qst);
    if($r_qst == true){
    	echo "<div id='mainbody'><p>";
    	while ($row = mysqli_fetch_assoc($r_qst)) {
    		$id = $row['id'];
    		$dater = $row['dater'];
    		$timer = $row['timer'];
    		$ipaddr = $row['ipaddr'];
    		$browser_os = $row['browser_os'];
    		$name = $row['name'];
    		$pics = $row['pics'];
	
				echo "<br><hr>
    				<table border='1px' style='width: 95%; margin: auto;'>
					<tr>
						<td><b>	ID No.	</b></td>
						<td><i> $id	</i></td>
					</tr>
					<tr>
						<td><b>	Date.	</b></td>
						<td><i> $dater	</i></td>
					</tr>
					<tr>
						<td><b>	Time.	</b></td>
						<td><i> $timer	</i></td>
					</tr>
					<tr>
						<td><b>	Internet Protocol.	</b></td>
						<td><i> $ipaddr	</i></td>
					</tr>
					<tr>
						<td><b>	Browser & OS.	</b></td>
						<td><i> $browser_os	</i></td>
					</tr>
					<tr>
						<td><b>	Name of Visitor.	</b></td>
						<td><i> $name	</i></td>
					</tr>
					<tr>
						<td><b>	Picture Collected.	</b></td>
						<td><i> $pics	</i></td>
					</tr>
					</table>
			    <hr>";
    		
    	}
    	echo "</p></div>";
    } else {
		echo'
		<div id="mainbody"> <p><b><i> Sorry, We could not Query the database, try again ! </i></b></p> </div><br>';
    }
} else {

echo '<div id="mainbody">
    <p><b><i>
    You are Denied access to this Page!!!...
    </i></b></p></div><br />';

}

?>



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



