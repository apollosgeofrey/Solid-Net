
<?php 
//here is the included header and Navigtion pages !!!
    include "header.php";
    include "navigation.php";

     $alertSuccess1 = ""; $alertError = ""; $alertSuccess2 = ""; $search_result = ""; $alertError_suggestion = ""; $button1 = ""; $button2 = "";
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
     <p class="jumbotron"> <strong style="color: blue; font-size: 20px;"><u class="text-center">SOLIDNET MULTIVISION SERVICES LIMITED! </u></strong><br><br><br>

      <?php
//This handles all searches
  if (isset($_GET['searchallsdgdggfgvgfbgSubmit'])) {
    if ($conn == true) {
    $searchall = trim(htmlentities(htmlspecialchars(mysqli_escape_string($conn, stripslashes($_GET['searchsfsdfsdf4r3all'])))));
    if (!empty($searchall) && $searchall != null) {

        $query_search = "SELECT * FROM `product_stored` WHERE product_name LIKE '%$searchall%' OR product_decription LIKE '%$searchall%'  ORDER BY id DESC";
        $query_search_run = mysqli_query($conn, $query_search);
        if ($query_search_run == true) {
          if (mysqli_num_rows($query_search_run) >= 1) {

            //start copy
            $alertSuccess1 = "Search Results for { $searchall } !";
              while ($rows = mysqli_fetch_assoc($query_search_run)) {
                $id = $rows['id'];
                $product_name = $rows['product_name'];
                $product_decription = $rows['product_decription'];
                $product_quantity = $rows['product_quantity'];
                $product_price_per_each = $rows['product_price_per_each'];
                $product_image_name = $rows['product_image_name'];
                if ($product_quantity >= 1) {
                  $product_quantity = "<span class='fa fa-check'></span>&nbsp&nbsp$product_quantity Unit/Pack Available in Store.";
                } else if ($product_quantity < 1) {
                  $product_quantity = "<span class='fa fa-remove'></span>&nbsp&nbspNot Available at the Moment !";
                } 

                if ($product_image_name != null && $product_image_name != 'no_pics' && !empty($product_image_name)) {
                  $product_image_name = "<img src='$product_image_name' class='center-block img-rounded img-responsive' width='70%' style='max-height: 550px; object-fit: contain;' alt='Sample Image'   onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }'/></a><br>";
                } else {
                  $product_image_name = "";
                }                 


              if(isset($_SESSION['rank'])){
                 if ($_SESSION['rank'] == 3) {
                    $button2 = "<a href='selectproducttochange.php'><button> Update/Delete This Now! </button></a>";
                  } else {
                    $button2 = "";
                  }
              }
              if (isset($_SESSION['rank'])) {
                  if ($_SESSION['rank'] == 3 || $_SESSION['rank'] == 1) {
                    $button1 = "<a href='issue_out_now.php?34434ifissetre4433fer=d323successfullyset2334er&34534534productIdfs4543=$id'> <button> Issue This To a Client Now!</button></a>";
                  } else {
                    $button1 = "";
                  }
                }
                $buttonssethere = "<em class='center-block'> $button1 $button2  </em>";
 

                $search_result .= "&nbsp <b style='font-size: 18px; color: blue;'> * <u>$product_name. </b></u><br>
                                  &nbsp&nbsp&nbsp <b><i> $product_decription  </i></b><br>
                                  &nbsp&nbsp&nbsp <b><i> $product_quantity  </i></b><br>
                                  &nbsp&nbsp&nbsp <b>Make Enquiries Via:&nbsp&nbsp<i style='font-size: 25px;'> 
                                  <a href='https://wa.me/+2348031372878?text=Good Day. I got this Whatsapp Number from Solidnet Multi-Vision Services Limited Official Website and would like to make some enquiries regarding $product_name.' target='__ new'><span class='fa fa-whatsapp'></span></a>&nbsp&nbsp&nbsp&nbsp  
                                  <a href='tel:+2348031372878'><span class='fa fa-phone'></span></a>&nbsp&nbsp&nbsp&nbsp
                                  <a href='mailto: $email; solidnetservicesltd@gmail.com ?subject=I got this address from the Company offical Website. & body = I will like to make some enquiries regarding $product_name.'><span class='fa fa-envelope'></span></a>&nbsp&nbsp</i><br>
                                    $buttonssethere
                                  </b>
                                  $product_image_name<br>";
              }

            $alertSuccess2 = "End of Search Results for { $searchall } !";
            //end of copy 

          } else {
              $alertError = "Sorry, No Search Results Specifically Available for { $searchall } See Suggessions Below (<span class='fa fa-arrow-down'></span>) ! ";
              //now i will fetch related input but i need to slit the inputs
              $searchall_array = explode(" ", $searchall);
              $searchall_array_length =  count($searchall_array);
              $found = 0;


              for ($i=0; $i < $searchall_array_length; $i++ ) { 
                 $query_search_oneby = "SELECT * FROM `product_stored` WHERE product_name LIKE '%$searchall_array[$i]%' OR product_decription LIKE '%$searchall_array[$i]%' ORDER BY id DESC";
                 $query_search_oneby_run = mysqli_query($conn, $query_search_oneby);
                 if (mysqli_num_rows($query_search_oneby_run) > 0) {
                   $found = 1;
                        while ($rows = mysqli_fetch_assoc($query_search_oneby_run)) {
                          $id = $rows['id'];
                          $product_name = $rows['product_name'];
                          $product_decription = $rows['product_decription'];
                          $product_quantity = $rows['product_quantity'];
                          $product_price_per_each = $rows['product_price_per_each'];
                          $product_image_name = $rows['product_image_name'];
                          if ($product_quantity >= 1) {
                            $product_quantity = "<span class='fa fa-check'></span>&nbsp&nbsp$product_quantity Unit/Pack Available in Store.";
                          } else if ($product_quantity < 1) {
                            $product_quantity = "<span class='fa fa-remove'></span>&nbsp&nbspNot Available at the Moment !";
                          } 

                          if ($product_image_name != null && $product_image_name != 'no_pics' && !empty($product_image_name)) {
                            $product_image_name = "<img src='$product_image_name' class='center-block img-rounded img-responsive' width='70%' style='max-height: 550px; object-fit: contain;' alt='Sample Image'   onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }'/></a><br>";
                          } else {
                            $product_image_name = "";
                          }

                           if(isset($_SESSION['rank'])){
                               if ($_SESSION['rank'] == 3) {
                                  $button2 = "<a href='selectproducttochange.php'><button> Update/Delete This Now! </button></a>";
                                } else {
                                  $button2 = "";
                                }
                            }
                          if (isset($_SESSION['rank'])) {
                            if ($_SESSION['rank'] == 3 || $_SESSION['rank'] == 1) {
                              $button1 = "<a href='issue_out_now.php?34434ifissetre4433fer=d323successfullyset2334er&34534534productIdfs4543=$id'> <button> Issue This To a Client Now!</button></a>";
                            } else {
                              $button1 = "";
                            }
                          }
                        $buttonssethere = "<em class='center-block'> $button1 $button2  </em>";


                          $search_result .= "&nbsp <b style='font-size: 18px; color: blue;'> * <u>$product_name. </b></u><br>
                                            &nbsp&nbsp&nbsp <b><i> $product_decription  </i></b><br>
                                            &nbsp&nbsp&nbsp <b><i> $product_quantity  </i></b><br>
                                            &nbsp&nbsp&nbsp <b>Make Enquiries Via:&nbsp&nbsp<i style='font-size: 25px;'> 
                                            <a href='https://wa.me/+2348031372878?text=Good Day. I got this Whatsapp Number from Solidnet Multi-Vision Services Limited Official Website and would like to make some enquiries regarding $product_name.' target='__ new'><span class='fa fa-whatsapp'></span></a>&nbsp&nbsp&nbsp&nbsp  
                                            <a href='tel:+2348031372878'><span class='fa fa-phone'></span></a>&nbsp&nbsp&nbsp&nbsp
                                            <a href='mailto: $email; solidnetservicesltd@gmail.com ?subject=I got this address from the Company offical Website. & body = I will like to make some enquiries regarding $product_name.'><span class='fa fa-envelope'></span></a>&nbsp&nbsp
                                              </i>
                                              $buttonssethere
                                              </b>
                                            $product_image_name<br>";
                        }

                 } 
              }
              if ($found > 0) {
                $alertSuccess1 = "Search Result's Suggessions for { $searchall } !";

                 $alertSuccess2 = "End of Search Result's Suggessions for { $searchall } !";

              } else if($found == 0) {
                $alertError_suggestion = "Sorry, No Search Result's Suggessions Specifically Available for { $searchall } !";
              }

          }
        } else {
          $alertError = "Sorry, We Encountered a Problem Querying the Database in Search fro { $searchall } !";
        }


    } else {
      $alertError = 'An Invalid Input Was Provided, Make Sure Your Search Value/Input is  not empty and Invalid !';
    }
  } else {
    $alertError = "Sorry, We Encountered a Problem Connecting and Querying the Database during Search Process !";
  }
  }
?>
      
      <?php if ($alertError != "") { echo "<br><b class='alert alert-danger text-center center-block'> $alertError </b><br><br>"; $alertError = "";} ?>  
      <?php if ($alertError_suggestion != "") { echo "<br><b class='alert alert-danger text-center center-block'> $alertError_suggestion </b><br><br>"; $alertError_suggestion = "";} ?>     
      <?php if ($alertSuccess1 != "") { echo "<b class='alert alert-success center-block text-center'> $alertSuccess1 </b>"; $alertSuccess1 = "";} ?>
       <?php if ($search_result != "") { echo "<b class='text-center'> $search_result </b><br>"; $search_result = "";} ?>
      <?php if ($alertSuccess2 != "") { echo "<br><b class='alert alert-success text-center center-block'> $alertSuccess2 </b><br><br>"; $alertSuccess2 = "";} ?>

      <b><u>We are well Known and recognizes due to the reliable services we have offered in diverse perspectives such as:</u></b><br>
 

        		<br> &nbsp <b> * MULTIFUNCTIONAL PRINTERS SPECIALIZATION: </b> { RICOH }
              <br><img src="Server_Pics/ricoh machine sales.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage" /><br>

        		<br> &nbsp <b> * SALES OF DIVERSE DIGITAL MACHINES AND RESPECTIVE SPARE PARTS. </b>
               <br><img src="Server_Pics/toner-oryginalny-rs.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' max-width="80%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * SALES OF CONSUMABLES. </b>
               <br><img src="Server_Pics/consumabless.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * SERVICING AND MAINTENANCE OF MULTIFUNCTIONAL PRINTERS. </b> 
               <br><img src="Server_Pics/ricohs.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * SOLAR SYSTEM POWER INSTALLATION AND MAINTENANCE. </b>
               <br><img src="Server_Pics/solar panss.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * DC HOME LIGHTING SYSTEMS. </b>
               <br><img src="Server_Pics/dc homes.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * DC SECURITY LIGHTING SYSTEMS. </b>
               <br><img src="Server_Pics/dc securitys.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * AC INVERTERS AND UN-INTERRUPTED POWER SUPPLY SETUP AND MAINTENANCE. </b>
               <br><img src="Server_Pics/inverterss.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * DOCK TO DAWN STREET LIGHTING SYSTEM AND MAINTENANCE. </b>
               <br><img src="Server_Pics/dock to downs.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        		<br> &nbsp <b> * CCTV SURVEILLANCE SYSTEM INSTALLATION AND MAINTENANCE. </b> 
               <br><img src="Server_Pics/cc tvs.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>
               <br><img src="Server_Pics/cctv 2s.jpg" onclick='if(document.fullscreenEnabled) { requestFullscreen(); }' ondblclick = 'if(document.fullscreenEnabled) { exitFullscreen(); }' class='center-block img-responsive' width="50%" alt="SampleImage"/><br>

        <br><br>
        <a href="contact.php"><u> Contact Us </u></a> For any of the above-mentioned services as excellence and reliability has been certified and credited to Us. <br><br>

     </p>
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