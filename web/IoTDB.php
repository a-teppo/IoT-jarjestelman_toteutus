<?php

class IoTDB {

    private $dbConnection;


    public function __construct() {
      try {
          $this->dbConnection = new PDO('mysql:host=localhost;dbname=jamk;charset=utf8','jamk', 'jamkiot');
          //$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
          //$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
           $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $ex) {
          echo "ErrMsg to enduser!<hr>";
          echo "CatchErrMsg: " . $ex->getMessage() . "<hr>";
          //logError($ex->getMessage());
      }
    }

    public function test()
    {
        echo "success!";
    }

    public function insert_temperature($id, $temperature)
    {
      $sql = "INSERT INTO Temperature (SensorID, SensorValue) VALUES ( :sensorid, :sensorvalue )";
      $stmt = $this->dbConnection->prepare($sql);

      $stmt->bindParam(':sensorid', $id, PDO::PARAM_INT);
      $stmt->bindValue(":sensorvalue",$temperature, PDO::PARAM_STR);
      $acffected_rows = $stmt->execute();
      return $acffected_rows;
    }

    public function insert_pressure($id, $pressure)
    {
      $sql = "INSERT INTO Pressure (SensorID, SensorValue) VALUES ( :sensorid, :sensorvalue )";
      $stmt = $this->dbConnection->prepare($sql);

      $stmt->bindParam(':sensorid', $id, PDO::PARAM_INT);
      $stmt->bindValue(":sensorvalue",$pressure, PDO::PARAM_STR);
      $acffected_rows = $stmt->execute();

      return $acffected_rows;
    }

    public function insert_humidity($id, $humidity)
    {
      $sql = "INSERT INTO Humidity (SensorID, SensorValue) VALUES ( :sensorid, :sensorvalue )";
      $stmt = $this->dbConnection->prepare($sql);

      $stmt->bindParam(':sensorid', $id, PDO::PARAM_INT);
      $stmt->bindValue(":sensorvalue",$humidity, PDO::PARAM_STR);
      $acffected_rows = $stmt->execute();

      return $acffected_rows;
    }

    public function CheckUser($user, $pass)
    {
      $sql = "SELECT Pass FROM User WHERE Name = :username";
      $stmt = $this->dbConnection->prepare($sql);
      $stmt->bindValue(":username",$user, PDO::PARAM_STR);
      $stmt->execute();

      $hash_pass = "";
    while($row = $stmt->fetchColumn())
    {
      $hash_pass =  $row;
    }

      if ( password_verify($pass, $hash_pass ) )
      { return True; }
      else
      { return False;}
    }

    public function setPassword($user, $pass)
    {
      $sql = 'UPDATE User SET Pass=$pass WHERE Name=$user ';
      if( $this->dbConnection->query($sql) === TRUE)
       { return True;}
       else
       { return False; }
    }

    public function getUser($cardID){

    $sql = "SELECT * FROM User WHERE CardID = :id";
    $stmt = $this->dbConnection->prepare($sql);
    $stmt->bindValue(":id",$cardID, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      $arr[] = $row;
    }

    return $arr[0];
}

}
?>