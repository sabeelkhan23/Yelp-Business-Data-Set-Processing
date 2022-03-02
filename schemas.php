<?php

require __DIR__ . '/vendor/autoload.php';

$DBname = "cis593";
$user = "root";
$pass = "Roy2994561998";

$db = new \DB\SQL('mysql:host=localhost;port=3306;dbname='. $DBname, $user, $pass);
$schema = new \DB\SQL\Schema( $db );



// Main table
$table = $schema->createTable('businessmain');
//NOT NULL FOREIGN KEY REFERENCES "business_id"
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('name')->type($schema::DT_VARCHAR256);
$table->addColumn('full_address')->type($schema::DT_VARCHAR256);
$table->addColumn('open')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('city')->type($schema::DT_VARCHAR128);
$table->addColumn('review_count')->type($schema::DT_INT);
$table->addColumn('longitude')->type($schema::DT_FLOAT);
$table->addColumn('latitude')->type($schema::DT_FLOAT);
$table->addColumn('state')->type($schema::DT_VARCHAR128);
$table->addColumn('stars')->type($schema::DT_FLOAT);
$table->addColumn('type')->type($schema::DT_VARCHAR128);
$table->build();


$table = $schema->createTable('hours');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('day')->type($schema::DT_VARCHAR128);
$table->addColumn('open')->type($schema::DT_VARCHAR128);
$table->addColumn('close')->type($schema::DT_VARCHAR128);
$table->build();


$table = $schema->createTable('categories');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('categories_name')->type($schema::DT_VARCHAR128);
$table->build();

$table = $schema->createTable('neighborhoods');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('neighborhoods_name')->type($schema::DT_VARCHAR128);
$table->build();


$table = $schema->createTable('attributes');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('Take_out')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Drive_Thru')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Caters')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Noise_Level')->type($schema::DT_VARCHAR128);
$table->addColumn('Takes_Reservations')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Delivery')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Has_TV')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Outdoor_Seating')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Attire')->type($schema::DT_VARCHAR128);
$table->addColumn('Alcohol')->type($schema::DT_VARCHAR128);
$table->addColumn('Waiter_Service')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Accepts_Credit_Cards')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Good_for_Kids')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Good_For_Groups')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('Price_Range')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->build();


$table = $schema->createTable('goodfor');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('dessert')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('latenight')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('lunch')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('dinner')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('brunch')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('breakfast')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->build();

$table = $schema->createTable('ambience');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('romantic')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('intimate')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('classy')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('hipster')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('divey')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('touristy')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('trendy')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('upscale')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('casual')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->build();

$table = $schema->createTable('parking');
$table->addColumn('business_id')->type($schema::DT_VARCHAR128);
$table->addColumn('garage')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('street')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('validated')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('lot')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->addColumn('valet')->type($schema::DT_BOOLEAN)->nullable(false)->defaults(0);
$table->build();