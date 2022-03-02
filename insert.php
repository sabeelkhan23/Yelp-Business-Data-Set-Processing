<?php

require __DIR__ . '/vendor/autoload.php';

$DBname = "cis593";
$user = "root";
$pass = "Roy2994561998";

$conn = new mysqli('localhost', $user, $pass, $DBname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "error";
} 

$msc = microtime(true);

//Main Schema insert
$output_data = array();
$file = fopen('csv/businessmain.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);


foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `businessmain` (`id`, `business_id`, `name`, `full_address`, `open`, `city`, `review_count`, `longitude`, `latitude`, `state`, `stars`, `type`) VALUES (NULL, '" . $value[0] . "', '" . $value[1] . "', '" . $value[2] . "', '" . $value[3] . "', '" . $value[4] . "', '" . $value[5] . "', '" . $value[6] . "', '" . $value[7] . "', '" . $value[8] . "', '" . $value[9] . "', '" . $value[10] . "')";

	$result = $conn->query($sql);
}

//
$output_data = array();
$file = fopen('csv/attributes.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `attributes` (`id`, `business_id`, `Take_out`, `Drive_Thru`, `Caters`, `Noise_Level`, `Takes_Reservations`, `Delivery`, `Has_TV`, `Outdoor_Seating`, `Attire`, `Alcohol`, `Waiter_Service`, `Accepts_Credit_Cards`, `Good_for_Kids`, `Good_For_Groups`, `Price_Range`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "', '". $value[2] . "', '". $value[3] . "', '". $value[4] . "', '". $value[5] . "', '". $value[6] . "', '". $value[7] . "', '". $value[8] . "', '". $value[9] . "', '". $value[10] . "', '". $value[11] . "', '". $value[12] . "', '". $value[13] . "', '". $value[14] . "', '". $value[15] . "')";

	$result = $conn->query($sql);
}


//
$output_data = array();
$file = fopen('csv/ambiences.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {

	//Insert data
	$sql = "INSERT INTO `ambience` (`id`, `business_id`, `romantic`, `intimate`, `classy`, `hipster`, `divey`, `touristy`, `trendy`, `upscale`, `casual`) VALUES (NULL, '" . $value[0] . "', '" . $value[1] . "', '" . $value[2] . "', '" . $value[3] . "', '" . $value[4] . "', '" . $value[5] . "', '" . $value[6] . "', '" . $value[7] . "', '" . $value[8] . "', '0')";

	$result = $conn->query($sql);
}

//
$output_data = array();
$file = fopen('csv/goodfor.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `goodfor` (`id`, `business_id`, `dessert`, `latenight`, `lunch`, `dinner`, `brunch`, `breakfast`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "', '". $value[2] . "', '". $value[3] . "', '". $value[4] . "', '". $value[5] . "', '". $value[6] . "')";

	$result = $conn->query($sql);
}


//
$output_data = array();
$file = fopen('csv/parking.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `parking` (`id`, `business_id`, `garage`, `street`, `validated`, `lot`, `valet`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "', '". $value[2] . "', '". $value[3] . "', '". $value[4] . "', '". $value[5] . "')";

	$result = $conn->query($sql);
}

//
$output_data = array();
$file = fopen('csv/categories.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `categories` (`id`, `business_id`, `categories_name`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "')";

	$result = $conn->query($sql);
}


//
$output_data = array();
$file = fopen('csv/hours.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `hours` (`id`, `business_id`, `day`, `open`, `close`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "', '". $value[2] . "', '". $value[3] . "')";

	$result = $conn->query($sql);
}


$output_data = array();
$file = fopen('csv/neighborhoods.csv', 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  $output_data[] = $line;
}
fclose($file);

foreach ($output_data as $key => $value) {
	//Insert data
	$sql = "INSERT INTO `neighborhoods` (`id`, `business_id`, `neighborhoods_name`) VALUES (NULL, '". $value[0] . "', '". $value[1] . "')";

	$result = $conn->query($sql);
}

$msc = microtime(true)-$msc;

$init = $msc;
$hours = floor($init / 3600);
$minutes = floor(($init / 60) % 60);
$seconds = $init % 60;

echo "execution time - " . "$hours:$minutes:$seconds";

$conn-> close();