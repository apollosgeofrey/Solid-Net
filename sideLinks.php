 

 <div class="col-sm-2 sidenav" id="link">
      <p><a href="productServices.php"><span class='glyphicon glyphicon-list'></span> Products & Services</a></p><hr>
      <p><a href="about.php"><span class='glyphicon glyphicon-info-sign'></span> About Us</a></p><hr>
      <p><a href="contact.php"><span class='glyphicon glyphicon-phone'></span> Contact Us</a></p><hr>
       <?php
            if (isset($_SESSION['email']) && isset($_SESSION['rank'])) {
                        echo "
                        <p><a href='admins&mastertools.php'><span class='glyphicon glyphicon-briefcase'></span> Admin Control Tools </a></p>";
           echo "<p><hr><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign out (Admin Only)</a></p>";
            }
      ?>
 </div>