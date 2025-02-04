<?php
  session_start();
  /**
   * @param void | null
   * @return array | mixed
   * @desc THis function creates a new PDO connection and returns the handler.
  **/
    function DbHandler ()
    {
        $dbHost = 'localhost';
        $dbName = 'e-learning_db';
        $dbUser = 'root';
        $dbPass = '12345678';
        //Create a DSN for the database resource...
        $Dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
        //Create an options configuration for the PDO connection...
        $options = array(
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
          $Connection = new PDO($Dsn, $dbUser, $dbPass, $options);
          return $Connection;
        } catch (Exception $e) {
          var_dump('Couldn\'t Establish A Database Connection. Due to the following reason: ' . $e->getMessage());
        }
    }
?>
