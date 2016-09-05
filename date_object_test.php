<?php

include 'dates_object.php';
$dtest = new dates_object();

$date = "1104-02-29";
$date2 = "1101-02-22";




echo $dtest->date_later_than($date, $date2);


?>
