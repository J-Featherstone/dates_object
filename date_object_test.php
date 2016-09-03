<?php

include 'dates_object.php';
$dtest = new dates_object();

$date = "1104-02-29";
$date2 = "1105-02-22";


if ($dtest->check_date_format($date)) {
	
	echo "valid date";
	
} else {
	echo "invalid date";
} 

if ($dtest->date_later_than($date, $date2)) {
	echo " d1 is later than d2";
} else {
	echo " d1 is not later than d2";
}


?>
