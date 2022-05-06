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

  // Blog randomnumber query
  $result = $randomnumber->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any randomnumbers
  if($num > 0) {
    // Randomnumber array
    $randomnumbers_arr = array();
    // $randomnumbers_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $randomnumber_item = array(
        'id' => $id,
        'value' => $value,
      );

      // Push to "data"
      array_push($randomnumbers_arr, $randomnumber_item);
      // array_push($randomnumbers_arr['data'], $randomnumber_item);
    }

    // Turn to JSON & output
    echo json_encode($randomnumbers_arr);

  } else {
    // No Randomnumbers
    echo json_encode(
      array('message' => 'No Randomnumbers Found')
    );
  }
