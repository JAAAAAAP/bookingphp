<?php 
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');
include_once('../plugin/script.php');



if (isset($_GET['product'])) {
  $id = $_GET['product'];
  // Process the ID here (e.g., update data in a database)
  echo "Updating data with ID: " . $id;
} else {
  echo "Missing ID parameter";
}






