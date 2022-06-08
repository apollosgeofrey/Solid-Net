<?php
  if (isset($_SESSION['email']) && isset($_SESSION['rank'])) {
      echo "<form class='jumbotron' method='get' action='search.php' autocomplete='on'>
           <p>";
            if ($searchErr != '') { echo "<p class='alert alert-danger text-center'> $searchErr <hr></p>"; $searchErr = '';}
            if ($invoiceSuc != '') { echo "<p class='alert alert-success text-center'> $invoiceSuc <hr></p>"; $invoiceSuc = '';}
             if ($searchSuc != '') { echo "<p class='alert alert-success text-center'> $searchSuc <hr></p>"; $searchSuc = '';}
          echo "<p>
            <label>Search Using Customer's Full Name  or <u>Invoice Number</u> below:</label>
            <input type='text' name='searchfield' required='' placeholder='Enter Customers Fullname or Invoice ID to Search' class='form-control' style='text-align: center;' value="; if(isset($_GET['searchfield'])) {echo $_GET['searchfield']; } else if (isset($_GET['invoicesuccess444333222']) && isset($_GET['invoicenum1234432112344321'])) {
              echo $invoiceId;
            } else if (isset($_GET['invoiceeditsuccess4112244333222']) && isset($_GET['invoiceeditnum12sdsdsd34432112344321'])) {
              echo $invoiceId2;
            } echo ">
           <center>
            <input type='submit' name='search' value='Search Now!'>
          </center></p>";
           if ($searchSuccess != '') { echo "<hr><center><b> ($row_counter) Available Search Results for <u>{ $searchval }</u>;<b></center><hr> <p class='jumbotron text-left' id='invoicesearcheresult'>  $searchSuccess </p> <hr><center><b> End of ($row_counter) Search for <u>{ $searchval }</u>; </b></center>"; $searchSuccess = '';}
         echo  "</p>
          </form>";
    } else {
      die("<br><hr><hr><p style='color=red; width: 100%; text-align: center;'><b><font color='red' size='6'>Your are Strongly Denied Access to This Page</font></b></p><hr><hr>");
    }

    ?>