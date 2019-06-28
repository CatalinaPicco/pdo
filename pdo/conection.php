<?php

try {

  $conection = new PDO('mysql:host=localhost;dbname=movies_db;port=3306;charset=utf8mb4', 'root', 'root',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {

  echo 'El error fue: ' . $e;

}
