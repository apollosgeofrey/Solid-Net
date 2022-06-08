
<nav class="navbar-default-top" style="height: auto;">
  <div id="logodiv">
         <a href="index.php">
            <img src='Server_Pics/arrows&globe.jpg' style="width: 100%; height: auto; border-radius: 5px;" > 
          </a>
    </div>
  <div class="container-fluid">
    <div class="navbar-header">
<script type="text/javascript">
    $(document).ready(function(){
      $(".navbar-toggle").click(function(){
        var ran = Math.random();
        var multran = ran * 2;
        var roundmultran = Math.round(multran);
        if (roundmultran == 0){
          $("#myNavbar").slideToggle("slow");
        } else if (roundmultran == 1) {
          $("#myNavbar").fadeToggle("slow");
        } else {
           $("#myNavbar").toggle("slow");
        }
      });
    });
</script>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li class=""><a href="productServices.php"><span class='glyphicon glyphicon-list'></span> Products & Services</a></li>
        <li class=""><a href="about.php"><span class='glyphicon glyphicon-info-sign'></span> About Us</a></li> 
        <li class=""><a href="contact.php"><span class='glyphicon glyphicon-phone'></span> Contact Us</a></li>  
        <?php 
            if (isset($_SESSION['email']) && isset($_SESSION['rank'])) { 
              echo"<li class=''><a href='profilesetting.php'><span class='glyphicon glyphicon-user'></span> Profile Settings</a></li>
              <li class=''><a href='search.php'><span class='glyphicon glyphicon-search'></span> Search Payment Invoice</a></li>"; 
                 if ($_SESSION['rank'] == '1' || $_SESSION['rank'] == '3') { 
                     echo"
                     <li class=''><a href='admins&mastertools.php'><span class='glyphicon glyphicon-briefcase'></span> Admin Control Tools </a></li>";
                 }
            }
        ?> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <?php
            if (isset($_SESSION['email'])) {
         echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign out (Admin Only)</a></li>";
            } else {
           //echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Sign in Here</a></li>";
            } 
         ?>
      </ul>

    </div>
    <div id="searchbar" class="form-control pull-right" style="width: 80%; height: 40px; margin: auto;"><form method="get" action="productServices.php">
    <input type="search" name="searchsfsdfsdf4r3all" placeholder="Search Out Available Products and Services!" style="text-align: center; width: 90%; height: 30px; border: none;" value="<?php if(isset($_GET['searchsfsdfsdf4r3all'])) {echo $_GET['searchsfsdfsdf4r3all']; } ?>"><button type="submit" name="searchallsdgdggfgvgfbgSubmit" style="width: 10%; border: none; height: 30px;"><span class='glyphicon glyphicon-search'></span></button>
  </form></div>
  </div>

  <div style="color: white; font-size: 25px; width: 90%; margin: auto; color: #B22222; font-family: Algeria;">
    <!-- <marquee behavior="alternate" scrolldelay="500"> -->
 &nbsp &nbsp &nbsp SOLIDNET MULTI-VISION SERVICES LIMITED! &nbsp &nbsp &nbsp &nbsp &nbsp [OFFICIAL WEBSITE!] &nbsp &nbsp &nbsp
  <!-- </marquee> --></div>
  
<?php
  if (isset($_SESSION['email'])) {
    if ($_SESSION['rank'] == '1' || $_SESSION['rank'] == '3'){
      $rank = "Admin";
    } else {
      $rank = "User";
    }
    echo "<b style='color: darkgreen; font-size: 20px;'><i>$rank: <b><u>". $_SESSION['first_name'] . " " . $_SESSION['sur_name'] ."</u> </b> is Active (<span class='fa fa-laptop'></span><span class='fa fa-check'></span>)</i></b>";
  }
  ?>
</nav>
