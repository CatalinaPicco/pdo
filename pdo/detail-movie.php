<?php
error_reporting(0);
require_once('conection.php');

$stmt = $conection->prepare("
SELECT m.title, m.length, m.rating, g.name as genero, m.id
 FROM movies m
 LEFT JOIN genres g ON m.genre_id = g.id
 WHERE m.id = :id
");

$stmt->BindValue(':id', $_GET['id'], PDO::PARAM_STR);

$stmt->execute();

$movie = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><?= $movie['title']?></h1>
    <p><?= $movie['genero']?></p>

    <h3>Detalles</h3>
    <ul>
      <li>Duracion: <?= $movie['length']?></li>
      <li>Rating: <?= $movie['rating']?></li>
    </ul>
    <a href="index.php">Volver</a>
  </body>
</html>
