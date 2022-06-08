
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "navigation.php";
?>
<script type="text/javascript">
  function showerman(idcountercaretdowncaretup){
    var arrayer = idcountercaretdowncaretup.split("]");
    var idcounters = arrayer[0]; 
    var caretdowns = arrayer[1];
    var caretups = arrayer[2];
    document.getElementById(idcounters).style.display='block';
    document.getElementById(caretdowns).style.display='none';
    document.getElementById(caretups).style.display='block';
  }

  function hiderman(idcountercaretupcaretdown){
    var arrayer = idcountercaretupcaretdown.split("]");
    var idcounterh = arrayer[0]; 
    var caretdownh = arrayer[1];
    var caretuph = arrayer[2];
    document.getElementById(idcounterh).style.display='none';
    document.getElementById(caretdownh).style.display='block';
    document.getElementById(caretuph).style.display='none';
  }
</script>

<!-- Animation sytle -->
<style type="text/css">
  .hidercont{ 
    display: none;
  }
</style>

<div class="container-fluid text-center col-sm-12" id="changer">    
  <div class="">
  <div class="col-sm-12" id="link_content">
   <?php 
        include "sideLinks.php";
   ?>

   <!-- here i will fetch the image in the database -->
  <?php
  $images_from_db = ""; $spans_to_create = ""; 
    $query_one = "SELECT image_path_name FROM home_screen_content WHERE content_type = 'slide_image' ORDER BY id DESC";
    if (isset($conn)) {
      $query_one_run = mysqli_query($conn, $query_one);
      if ($query_one_run == true && mysqli_num_rows($query_one_run) >= 1) {
          while ($row1 = mysqli_fetch_assoc($query_one_run)) {
            $image_path_name = $row1['image_path_name'];
              $images_from_db .= "
                <li><img src='$image_path_name' style='width: 100%; object-fit: fill;' class='img-responsive' title='' id='wows1_1'/></li>
              ";

              $spans_to_create .=  "<span class='dot'>  </span>";
          }
      }
    }


    //fectching text from db
$text_from_db = "";

    $query_two = "SELECT header, header_color, text_value FROM home_screen_content WHERE content_type = 'home_text' ORDER BY id DESC";
    if (isset($conn)) {
      $query_two_run = mysqli_query($conn, $query_two);
      if ($query_two_run == true && mysqli_num_rows($query_two_run) >= 1) {
          while ($row2 = mysqli_fetch_assoc($query_two_run)) {
            $header_title = $row2['header'];
            $header_color = $row2['header_color'];
            $text_value = $row2['text_value'];
              $text_from_db .= "<div class='col-sm-12 text-center' id='boxes'  style='border: 1px solid #000000; margin-top: 10px; margin-bottom: 10px; font-size: 15px; height: auto; border-radius: 4px; background: #ADD8E6'><br><b><center><a style='color: $header_color'> $header_title ! </a></center></b><hr><i> $text_value  <br><a href='contact.php'>Contact Us</a>. </i><br><br></div>              
              ";
          }
      }
    }



 //fectching text from db
$default_text_from_db = ""; $counter = 1;

    $query_three = "SELECT header, header_color, text_value FROM home_screen_content WHERE content_type = 'default' ORDER BY id DESC";
    if (isset($conn)) {
      $query_three_run = mysqli_query($conn, $query_three);
      if ($query_three_run == true && mysqli_num_rows($query_three_run) >= 1) {
          while ($row3 = mysqli_fetch_assoc($query_three_run)) {
            $header_title_default = $row3['header'];
            $header_color_default = $row3['header_color'];
            $text_value_default = $row3['text_value'];
            $idcounter = "boxes".strval($counter);
            $caretdown = "caretdown".strval($counter);
            $caretup = "caretup".strval($counter);
              $default_text_from_db .= "<div class='col-md-4' style='border: 1px solid #000000; margin-top: 10px; height: auto; border-radius: 4px; background: #ADD8E6'><b><center>

              <a onclick=showerman('$idcounter]$caretdown]$caretup') href='#nodirection' style='font-size: 15px; color: $header_color_default' id='$caretdown'> <span class='fa fa-caret-down'> </span>    $header_title_default    </a>

              <a onclick=hiderman('$idcounter]$caretdown]$caretup') href='#nodirection' class='hidercont' style='font-size: 15px; color: $header_color_default;' id='$caretup'> <span class='fa fa-caret-up'> </span>    $header_title_default    </a>
              </center></b><hr>

              <i class='hidercont' id='$idcounter'>  $text_value_default  <a href='contact.php'>Contact Us</a> <br><br></i></div>  ";
               $counter = $counter + 1;
          }
        }
    }
  ?>


    <div class="col-sm-10 text-left" id="content"> 
<!-- This is here i will always add my contents !!!-->
       <!-- Slide Images -->
       <center>



<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1" style="height: auto;">
<div class="ws_images" style="height: auto; width: 100%;"><ul>

 <?php
          if (isset($images_from_db)) {
            if ($images_from_db != null && !empty($images_from_db)) {
               echo $images_from_db;
               $images_from_db = "";
             } 
          }
  ?>

    <li>
     <img src='Server_Pics/homepics.png' style='width: 100%; object-fit: fill;' class='img-responsive' id='wows1_1'/>
      </li>
  </ul></div>
  <div class="ws_bullets"><div>
  
  </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">image slider</a> by WOWSlider.com v9.0</div>
<div class="ws_shadow"></div>
</div>  
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

       
               
      </center>
      <!-- This will be the end of my contents !!!... -->
  
    <?php
          if (isset($text_from_db)) {
            if ($text_from_db != null && !empty($text_from_db)) {
               echo $text_from_db;
               $text_from_db = "";
             } 
          }
        ?>

    <div class="col-sm-12" id="services" style="font-size: 15px; height: auto;">

      
 <?php
          if (isset($default_text_from_db)) {
            if ($default_text_from_db != null && !empty($default_text_from_db)) {
               echo $default_text_from_db;
               $default_text_from_db = "";
             } 
          }
  ?>

<!-- End of Content -->

    </div>
  </div>
    <!--<div class="col-sm-1 sidenav">
     <?php
     // here is the included ads page
       // include "ads.php";
      ?>
    </div>-->

  </div>
</div>

<br>
<?php
// here is the included footer
include "footer.php";
?>