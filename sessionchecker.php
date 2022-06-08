<?php

 if (!isset($_SESSION['email']) || !isset($_SESSION['rank'])){
 		header("Location: productServices.php");
    	die("Sorry, Access to this page has been Denied !!!");
    }

function generalAdminMaster(){
 if ($_SESSION['rank'] != '1' && $_SESSION['rank'] != '3'){
    	header("Location: productServices.php");
    	die("Sorry, Access to this page has been Denied !!!");
    }
}

function adminMaster(){
 if ($_SESSION['rank'] != 3){
    	header("Location: productServices.php");
    	die("Sorry, Access to this page has been Denied !!!");
    }
}




function numberTowords($num){ 
				$ones = array(
				1 => "one",
				2 => "two",
				3 => "three",
				4 => "four",
				5 => "five",
				6 => "six",
				7 => "seven",
				8 => "eight",
				9 => "nine",
				10 => "ten",
				11 => "eleven",
				12 => "twelve",
				13 => "thirteen",
				14 => "fourteen",
				15 => "fifteen",
				16 => "sixteen",
				17 => "seventeen",
				18 => "eighteen",
				19 => "nineteen"
				);
				$tens = array(
				1 => "ten",
				2 => "twenty",
				3 => "thirty",
				4 => "forty",
				5 => "fifty",
				6 => "sixty",
				7 => "seventy",
				8 => "eighty",
				9 => "ninety"
				);
				$hundreds = array(
				"hundred",
				"thousand",
				"million",
				"billion",
				"trillion",
				"quadrillion"
				);
				$num = number_format($num,2,".",",");
				$num_arr = explode(".",$num);
				$wholenum = $num_arr[0];
				$decnum = $num_arr[1];
				$whole_arr = array_reverse(explode(",",$wholenum));
				krsort($whole_arr);
				$words = "";
				foreach($whole_arr as $key => $i) {
				if($i == 0) {
				continue;
				}
				if($i < 20) {
				$words .= $ones[intval($i)];
				} elseif($i < 100) {
				if(substr($i,0,1) == 0 && strlen($i) == 3) {
				$words .= $tens[substr($i,1,1)];
				if(substr($i,2,1) != 0) {
				$words .= " ".$ones[substr($i,2,1)];
				}
				} else {
				$words .= $tens[substr($i,0,1)];
				if(substr($i,1,1) != 0) {
				$words .= " ".$ones[substr($i,1,1)];
				}
				}
				} else {
				// $words .= $ones[substr($i,0,1)]." ".$hundreds[0].' and ';
				if(substr($i,1,1) != 0 || substr($i,2,1) != 0) {
				$words .= $ones[substr($i,0,1)]." ".$hundreds[0].' and ';
				} else {
				$words .= $ones[substr($i,0,1)]." ".$hundreds[0];
				}
				if(substr($i,1,2) < 20 && substr($i,1,1) != 0) {
				$words .= " ".$ones[(substr($i,1,2))];
				} else {
				if(substr($i,1,1) != 0) {
				$words .= " ".$tens[substr($i,1,1)];
				}
				if(substr($i,2,1) != 0) {
				$words .= " ".$ones[substr($i,2,1)];
				}
				}
				}
				if($key > 0) {
				$words .= " ".$hundreds[$key]." ";
				}
				}
				$words .= $unit??' ';
				if($decnum > 0) {
				$words .= " and ";
				if($decnum < 20) {
				$words .= $ones[intval($decnum)];
				} elseif($decnum < 100) {
				$words .= $tens[substr($decnum,0,1)];
				if(substr($decnum,1,1) != 0) {
				$words .= " ".$ones[substr($decnum,1,1)];
				}
				}
				$words .= $subunit??' subunits';
				}
				return ucwords($words);

}



?>

