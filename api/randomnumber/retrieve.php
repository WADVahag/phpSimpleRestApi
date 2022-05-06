<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Randomnumber.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog randomnumber object
  $randomnumber = new Randomnumber($db);

  // Get ID
  $randomnumber->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get randomnumber
  $randomnumber->read_single();

  // Generate array
  $randomnumber_arr = array(
    'id' => $randomnumber->id,
    'value' => $randomnumber->value,
  );

  // Make JSON
  print_r(json_encode($randomnumber_arr));