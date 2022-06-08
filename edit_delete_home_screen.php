
<?php 
ob_start();
//here is the included header and Navigti = "";on pages !!!
    include "header.php";
    require "sessionchecker.php";
    adminMaster();

    include "navigation.php";
    $home_contentErr = "";   $alertSuccess1 = ""; $alertError = "";

?>

<style type="text/css">
    #buttonforward, #buttondelete{ display: none;}
</style>
<script type="text/javascript">
      function showbutton(){
        var selecter_value = document.getElementById('selecter').value;
        if (selecter_value == "Select a Home Content for Update" || selecter_value == "No Home Content Currently Available!") {
          document.getElementById('buttonforward').style.display = 'none';
          document.getElementById('buttondelete').style.display = 'none';
        } else { 
          if (selecter_value.includes('default')) {
              document.getElementById('buttondelete').style.display = 'none';
               document.getElementById('buttonforward').style.display = 'block';
            } else {
               document.getElementById('buttondelete').style.display = 'block';
            }
          if (selecter_value.includes('slide_image')) {
            document.getElementById('buttonforward').style.display = 'none';
          } else {
            document.getElementById('buttonforward').style.display = 'block';
          }   
        }
      }
</script>

<div class="container-fluid text-center" id="changer">    
  <div class="row content">
  <div class="col-sm-12" id="link_content">
   <?php 

//deleter notifyer
if (isset($_GET['deltenow211212123222']) && isset($_GET['dsdsdidtodeletedfsdss'])) {
  if ($_GET['deltenow211212123222'] == "dsdsdsdeyesdelete34333") {
    $name_pro = $_GET['dsdsdidtodeletedfsdss'];
      $alertSuccess1 = "Successfully, The Home-Screen Content &nbsp <b>{ $name_pro }</b> &nbsp was Deleted and Removed !.";
  }
}

//here i begaan delete
   if (isset($_POST['deleter'])) {
      if ($conn == true) {        
        $home_content =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['home_content'])))));
       if ($home_content != null && !empty($home_content) && $home_content != "Select a Home Content for Update" && $home_content != "No Home Content Currently Available!") {
            $start_bo = strrpos($home_content, "(");
            $start_bc = strrpos($home_content, ")");
            $main_id_catch = "";
            for($i = $start_bo+1; $i <= $start_bc-1; $i++){
              $main_id_catch = $main_id_catch . $home_content[$i];
            }
            $query2 = "DELETE FROM `home_screen_content` WHERE id='$main_id_catch'";
            $query2_run = mysqli_query($conn, $query2);
            if ($query2_run == true) {
              header("location: edit_delete_home_screen.php?deltenow211212123222=dsdsdsdeyesdelete34333&dsdsdidtodeletedfsdss=$home_content");
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
        $home_content =  trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_POST['home_content'])))));
          if ($home_content != null && !empty($home_content) && $home_content != "Select a Home Content for Update" && $home_content != "No Home Content Currently Available!") {
            $start_bo = strrpos($home_content, "(");
            $start_bc = strrpos($home_content, ")");
            $main_id_catch = "";
            for($i = $start_bo+1; $i <= $start_bc-1; $i++){
              $main_id_catch = $main_id_catch . $home_content[$i];
            }
            header("location: change_edit_delete_home_screen_ediiter.php?111000999333fromSelector55ToChangein1113444666=99333fromSelector55ToChangeinjhddfjkbfd&ukuidiud99333IDfromSelector55ToIDChangeinID=$main_id_catch");
          } else {
            $alertError = "Error, An Invalid Home-Screen Content has Been Selected !.";
            $product_nameErr = "Please, Select a valid Home Screen Content as Provided !.";
          }
      }

   }
        include "sideLinks.php";
  ?>
    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->


<?php if ($alertError != "") { echo "<br><p class='alert alert-danger text-center'> $alertError </p>"; $alertError = "";} ?>
<?php if ($alertSuccess1 != "") { echo "<br><p class='alert alert-success text-center'> $alertSuccess1 </p>"; $alertSuccess1 = "";} ?>
    <h3><u><center><b>Edit and Delete an Existing Home Screen Content.</b></center></u></h3>
    <!-- this is my error shower -->
     <div id="errorshow" class="text-center" >
       
    </div><br>

    <form method="post" action="edit_delete_home_screen.php" autocomplete="on">
       <p class="jumbotron">
          <label>Select a Home Content to be Updated/Deleted below: (Required)<br>&nbsp &nbsp{<b style="color: red;">Note:</b>&nbsp &nbsp<i>Image on this list are Ordered in the same pattern tas slides at Home screen. "i.e, Last Added  appears at the Top!"</i>}</label>
          <select  class='form-control' name='home_content' required='' onchange='showbutton()' id='selecter'>
            <option>Select a Home Content for Update</option>
            <?php
              $query_fetch = "SELECT id, content_type, header, image_path_name FROM `home_screen_content` ORDER BY id DESC";
              if ($conn == true) {
                $query_fetch_run = mysqli_query($conn, $query_fetch);
                if ($query_fetch_run == true && mysqli_num_rows($query_fetch_run) > 0) {
                  while ($rows = mysqli_fetch_assoc($query_fetch_run)) {
                    $id = $rows['id'];
                    $content_type = $rows['content_type'];
                    $header = $rows['header'];
                    $image_path_name = $rows['image_path_name'];
                    echo "<option>$content_type { $header $image_path_name } ($id)";
                  }
                } else {
                  echo "<option>No Home Content Currently Available!</option>";
                }
            }
            ?>
          </select> <br><span style="color: red;"><i> <?php echo $home_contentErr;  ?> </i></span>
        </p>
        
        <p id="buttonforward">
          <button class='form-control' name='submit' class='form-control'><b>Update and Save to Home Screen &nbsp &nbsp &nbsp &nbsp <span class='glyphicon glyphicon-arrow-right'></span></b></button>
        </p>
        <p id="buttondelete">
          <button class='form-control' name='deleter' class='form-control'><b>Delete From Home Screen &nbsp &nbsp &nbsp &nbsp <span class='glyphicon glyphicon-trash'></span></b></button>
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