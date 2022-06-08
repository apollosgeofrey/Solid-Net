
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    adminMaster();

    include "navigation.php";
    $product_nameErr = "";   $alertSuccess1 = ""; $alertError = "";

?>

<style type="text/css">
    #buttonforward, #buttondelete{ display: none;}
</style>
<script type="text/javascript">
      function showbutton(){
        var selecter_value = document.getElementById('selecter').value;
        if (selecter_value == "Select a Product/Service for Update" || selecter_value == "No Product/Service Currently Available in Store!") {
          document.getElementById('buttonforward').style.display = 'none';
          document.getElementById('buttondelete').style.display = 'none';
        } else { 
          document.getElementById('buttondelete').style.display = 'block';
          document.getElementById('buttonforward').style.display = 'block';  }
      }
</script>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 


if (isset($_GET['deltenow211212123222']) && isset($_GET['dsdsdidtodeletedfsdss'])) {
  if ($_GET['deltenow211212123222'] == "dsdsdsdeyesdelete34333") {
    $name_pro = $_GET['dsdsdidtodeletedfsdss'];
      $alertSuccess1 = "Successfully, The Product/Service &nbsp <b>{ $name_pro }</b> &nbsp was Deleted and Removed from the Store !.";
  }
}

//here i begaan delete
   if (isset($_POST['deleter'])) {
      if ($conn == true) {        
        $product_service =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['product_service'])))));
       if ($product_service != null && !empty($product_service) && $product_service != "Select a Product/Service for Update" && $product_service != "No Product/Service Currently Available in Store!") {
            $start_bo = strrpos($product_service, "(");
            $start_bc = strrpos($product_service, ")");
            $main_id_catch = "";
            for($i = $start_bo+1; $i <= $start_bc-1; $i++){
              $main_id_catch = $main_id_catch . $product_service[$i];
            }
            $query2 = "DELETE FROM `product_stored` WHERE id='$main_id_catch'";
            $query2_run = mysqli_query($conn, $query2);
            if ($query2_run == true) {
              header("location: selectproducttochange.php?deltenow211212123222=dsdsdsdeyesdelete34333&dsdsdidtodeletedfsdss=$product_service");
            } else {
              $alertError = "Sorry, We Couldn't Query the Database !.";
            }
      } 
     } else {
      $alertError = "Sorry, We Couldn't Connect to the Server !.";
     }
   }

//here i began form validation
    if (isset($_POST['submit'])) {
      if ($conn == true) {        
        $product_service =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['product_service'])))));
          if ($product_service != null && !empty($product_service) && $product_service != "Select a Product/Service for Update" && $product_service != "No Product/Service Currently Available in Store!") {
            $start_bo = strrpos($product_service, "(");
            $start_bc = strrpos($product_service, ")");
            $main_id_catch = "";
            for($i = $start_bo+1; $i <= $start_bc-1; $i++){
              $main_id_catch = $main_id_catch . $product_service[$i];
            }
            header("location: changeinstore.php?111000999333fromSelector55ToChangeinstore1113444666=99333fromSelector55ToChangeinstorejhddfjkbfd&ukuidiud99333IDfromSelector55ToIDChangeinIDstore=$main_id_catch");
          } else {
            $alertError = "Error, An Invalid Product or Service Name has Been Selected !.";
            $product_nameErr = "Please, Select a valid Product or Service name as Provided !.";
          }
      }

   }
        include "sideLinks.php";
  ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->


<?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
    <h3><u><center><b>Edit and Update an Existing Product/Service to the Store.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="selectproducttochange.php" autocomplete="on">
       <p class="jumbotron">
          <label>Select a Product or Service to be Updated below: (Required)</label>
          <select  class='form-control' name='product_service' required='' onchange='showbutton()' id='selecter'>
            <option>Select a Product/Service for Update</option>
            <?php
              $query_fetch = "SELECT id, product_name, product_decription FROM product_stored ORDER BY id DESC";
              if ($conn == true) {
                $query_fetch_run = mysqli_query($conn, $query_fetch);
                if ($query_fetch_run == true && mysqli_num_rows($query_fetch_run) > 0) {
                  while ($rows = mysqli_fetch_assoc($query_fetch_run)) {
                    $id = $rows['id'];
                    $product_name = $rows['product_name'];
                    $product_decription = $rows['product_decription'];
                    echo "<option>$product_name { $product_decription } ($id)";
                  }
                } else {
                  echo "<option>No Product/Service Currently Available in Store!</option>";
                }
            }
            ?>
          </select> <br><span style="color: red;"><i> <?php echo $product_nameErr;  ?> </i></span>
        </p>
        
        <p id="buttonforward">
          <button class='form-control' name='submit' class='form-control'><b>Update and Save to Store &nbsp &nbsp &nbsp &nbsp <span class='glyphicon glyphicon-arrow-right'></span></b></button>
        </p>
        <p id="buttondelete">
          <button class='form-control' name='deleter' class='form-control'><b>Delete From Store &nbsp &nbsp &nbsp &nbsp <span class='glyphicon glyphicon-trash'></span></b></button>
        </p><br><br>        
    </form>


<!-- End of Content -->
    </div>
  </div>
   <!-- <div class="col-sm-1 sidenav">
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