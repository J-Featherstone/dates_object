<?php

include 'dates_object.php';
$dtest = new dates_object();

$date = "104-02-29";


if ($dtest->check_date_format($date)) {
	
	echo "valid date";
	
} else {
	echo "invalid date";
} 




?>
