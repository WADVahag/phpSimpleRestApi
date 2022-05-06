<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: RANDOMNUMBER');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Randomnumber.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog randomnumber object
  $randomnumber = new Randomnumber($db);

  // Get raw randomnumbered data
  $data = json_decode(file_get_contents("php://input"));

  $randomnumber->value = rand();

  // Generate randomnumber
  if($randomnumber->generate()) {
    echo json_encode(
      array('message' => 'Randomnumber Generated')
    );
  } else {
    echo json_encode(
      array('message' => 'Randomnumber Not Generated')
    );
  }

