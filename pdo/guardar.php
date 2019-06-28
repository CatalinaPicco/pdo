<?php
error_reporting(0);
require_once('conection.php');

$stmt_gen = $conection->prepare("
SELECT id, name FROM genres
");

$stmt_gen->execute();

$genres = $stmt_gen->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {
  //var_dump($_POST);
  $genre_id = $_POST["genre"];
  $title = $_POST["title"];
  $rating = $_POST["rating"];
  $length = $_POST["length"];
  $fecha = $_POST["release_date"];
  $stmt = $conection->prepare("
  INSERT INTO movies (title, length, rating, release_date) VALUES('$title', $length, $rating, '$fecha');
  ");

try {
  $stmt->execute();
  header('Location: index.php');
  exit;
} catch (PDOException $e) {
  echo 'El error fue: ' . $e;
}

}

?>
