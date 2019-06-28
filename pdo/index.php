<?php

require_once('conection.php');

$stmt = $conection->prepare("
SELECT m.title, g.name as genero, m.id
 FROM movies m
 LEFT JOIN genres g ON m.genre_id = g.id
");

$stmt->execute();

$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<ul>
  <?php foreach ($movies as $OneMovie): ?>
    <li>
      <?= $OneMovie['title'];?>
      <?= $OneMovie['genero'];?>
      <a href="detail-movie.php?id=<?= $OneMovie['id'];?>">Ver más</a>
    </li>
  <?php endforeach; ?>
</ul>
<a href="agregarPelicula.php">Agregar película</a>
<a href="buscador.php">Buscá película</a>
  </body>
</html>
