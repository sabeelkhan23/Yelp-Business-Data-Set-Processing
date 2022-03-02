<?php

$file_read = file_get_contents('./JSONData/business100ValidForm.json');
$data_from_josn = json_decode($file_read, TRUE); 



$businessmain = array();
$hours = array();
$categories = array();
$categories_relational_schema = array();
$neighborhoods = array();
$attributes = array();
$goodfor = array();
$ambience = array();
$parking = array();

function file_put_contents_csv($file_name ='', $data)
{
	$fp = fopen($file_name, 'w');
	foreach ($data as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}

function add_hours($value, $day = "" , $day_open_close_data)
{
	$temp = array(
		"business_id" => $value['business_id'],
		$day => $day,
		"open" => !is_null($day_open_close_data)? $day_open_close_data["open"] : "",
		"close" => !is_null($day_open_close_data)? $day_open_close_data["close"] : ""
	);
	
	return $temp;
}

foreach ($data_from_josn["Business"] as $key => $value) {
	
	if (array_key_exists('business_id', $value)) {
		
		$businessmain[$value['business_id']] = array(
			"business_id" => $value['business_id'],
			"name" => $value['name'],
			"full_address" => $value['full_address'],
			"open" => $value['open'],
			"city" => $value['city'],
			"review_count" => $value['review_count'],
			"longitude" => $value['longitude'],
			"latitude" => $value['latitude'],
			"state" => $value['state'],
			"stars" => $value['stars'],
			"type" => $value['type']
		);

	}

	if (array_key_exists('business_id', $value) && array_key_exists('hours', $value)) {
		
		$Monday = array_key_exists('Monday', $value['hours'])? $value['hours']['Monday'] : NULL;
		$Tuesday = array_key_exists('Tuesday', $value['hours'])? $value['hours']['Tuesday'] : NULL;
		$Wednesday = array_key_exists('Wednesday', $value['hours'])? $value['hours']['Wednesday'] : NULL;
		$Thursday = array_key_exists('Thursday', $value['hours'])? $value['hours']['Thursday'] : NULL;
		$Friday = array_key_exists('Monday', $value['hours'])? $value['hours']['Friday'] : NULL;
		$Saturday = array_key_exists('Saturday', $value['hours'])? $value['hours']['Saturday'] : NULL;
		$Sunday = array_key_exists('Sunday', $value['hours'])? $value['hours']['Sunday'] : NULL;

		$hours_schema[$value['business_id'] . "Monday"] = add_hours($value, "Monday", $Monday);
		$hours_schema[$value['business_id'] . "Tuesday"] = add_hours($value, "Tuesday", $Tuesday);
		$hours_schema[$value['business_id'] . "Wednesday"] = add_hours($value, "Wednesday", $Wednesday);
		$hours_schema[$value['business_id'] . "Thursday"] = add_hours($value, "Thursday", $Thursday);
		$hours_schema[$value['business_id'] . "Friday"] = add_hours($value, "Friday", $Friday);
		$hours_schema[$value['business_id'] . "Saturday"] = add_hours($value, "Saturday", $Saturday);
		$hours_schema[$value['business_id'] . "Sunday"] = add_hours($value, "Sunday", $Sunday);

	}

	if (array_key_exists('business_id', $value) && array_key_exists('categories', $value)) {
		$categories_relational_schema = array_unique(array_merge($categories_relational_schema,$value['categories']));
		array_unshift($value['categories'], $value['business_id']);
		$i = 0; 
		foreach ($value['categories'] as $keysub => $valuesub) {
			if ($i != 0) {
				$categories[$value['business_id'] . $valuesub] = array($value['business_id'], $valuesub);
			}
			$i++;
		}
	}

	if (array_key_exists('business_id', $value) && array_key_exists('neighborhoods', $value)) {
		if (!empty($value['neighborhoods'])) {
			array_unshift($value['neighborhoods'], $value['business_id']);
			$neighborhoods[$value['business_id']] = $value['neighborhoods'];
		}
	}

	if (array_key_exists('business_id', $value) && array_key_exists('attributes', $value)) {
		
		$attributes[$value['business_id']] = array(
			"business_id" => $value['business_id'],
			"Take-out" => array_key_exists("Take-out", $value['attributes'])? $value['attributes']['Take-out'] : false,
			"Drive-Thru" => array_key_exists("Drive-Thru", $value['attributes'])? $value['attributes']['Drive-Thru'] : false,
			"Caters" => array_key_exists("Caters", $value['attributes'])? $value['attributes']['Caters'] : false,
			"Noise Level" => array_key_exists("Noise Level", $value['attributes'])? $value['attributes']['Noise Level'] : "",
			"Takes Reservations" => array_key_exists("Takes Reservations", $value['attributes'])? $value['attributes']['Takes Reservations'] : false,
			"Delivery" => array_key_exists("Delivery", $value['attributes'])? $value['attributes']['Delivery'] : false,
			"Has TV" => array_key_exists("Has TV", $value['attributes'])? $value['attributes']['Has TV'] : false,
			"Outdoor Seating" => array_key_exists("Outdoor Seating", $value['attributes'])? $value['attributes']['Outdoor Seating'] : false,
			"Attire" => array_key_exists("Attire", $value['attributes'])? $value['attributes']['Attire'] : "",
			"Alcohol" => array_key_exists("Alcohol", $value['attributes'])? $value['attributes']['Alcohol'] : "",
			"Waiter Service" => array_key_exists("Waiter Service", $value['attributes'])? $value['attributes']['Waiter Service'] : false,
			"Accepts Credit Cards" => array_key_exists("Accepts Credit Cards", $value['attributes'])? $value['attributes']['Accepts Credit Cards'] : false,
			"Good for Kids" => array_key_exists("Good for Kids", $value['attributes'])? $value['attributes']['Good for Kids'] : false,
			"Good For Groups" => array_key_exists("Good For Groups", $value['attributes'])? $value['attributes']['Good For Groups'] : false,
			"Price Range" => array_key_exists("Price Range", $value['attributes'])? $value['attributes']['Price Range'] : 0
		);

		if (array_key_exists("Good For", $value['attributes'])) {
			array_unshift($value['attributes']['Good For'], $value['business_id']);
			$goodfor[$value['business_id']] = $value['attributes']['Good For'];
		}

		if (array_key_exists("Ambience", $value['attributes'])) {
			array_unshift($value['attributes']['Ambience'], $value['business_id']);
			$ambience[$value['business_id']] = $value['attributes']['Ambience'];
		}

		if (array_key_exists("Parking", $value['attributes'])) {
			array_unshift($value['attributes']['Parking'], $value['business_id']);
			$parking[$value['business_id']] = $value['attributes']['Parking'];
		}
		

		

	}

}



file_put_contents_csv("csv/businessmain.csv", $businessmain);
file_put_contents_csv("csv/hours.csv", $hours);

//Loap thre list to make the row format
$output_categories_relational_schema = array();
foreach ($categories_relational_schema as $key => $value) {
	$output_categories_relational_schema[$value] = array($value => $value);
}
file_put_contents_csv("csv/categories_relational_schema.csv", $output_categories_relational_schema);
file_put_contents_csv("csv/categories.csv", $categories);
file_put_contents_csv("csv/neighborhoods.csv", $neighborhoods);
file_put_contents_csv("csv/attributes.csv", $attributes);
file_put_contents_csv("csv/goodfor.csv", $goodfor);
file_put_contents_csv("csv/ambience.csv", $ambience);
file_put_contents_csv("csv/parking.csv", $parking);
