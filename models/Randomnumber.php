<?php 
  class Randomnumber {
    // DB stuff
    private $conn;
    private $table = 'randomnumbers';

    // Randomnumber Properties
    public $id;
    public $value;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Randomnumbers
    public function read() {
      // Generate query
      $query = 'SELECT * FROM ' . $this->table . ' ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Randomnumber
    public function read_single() {
          // Generate query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->value = $row['value'];

    }

    // Generate Randomnumber
    public function generate() {
          // Generate query
          $query = 'INSERT INTO ' . $this->table . ' SET value = :value';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->value = htmlspecialchars(strip_tags($this->value));


          // Bind data
          $stmt->bindParam(':value', $this->value);


          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Randomnumber
    public function update() {
          // Generate query
          $query = 'UPDATE ' . $this->table . ' SET value = :value WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->value = htmlspecialchars(strip_tags($this->value));

          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':value', $this->value);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Randomnumber
    public function delete() {
          // Generate query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }