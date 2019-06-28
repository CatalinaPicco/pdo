<?php
error_reporting(0);
require_once('conection.php');

if ($_GET) {
  $word = $_GET["buscar"];
  $tipo = $_GET["tipo"];
  if ($tipo == "s") {
    $stmt_bus = $conection->prepare("
    SELECT * FROM series WHERE title LIKE '%$word%';
    ");
  } else {
    $stmt_bus = $conection->prepare("
    SELECT * FROM movies WHERE title LIKE '%$word%';
    ");
  }


  $stmt_bus->execute();

  $results = $stmt_bus->fetchAll(PDO::FETCH_ASSOC);



}


?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Buscá películas o series</h1>

    <form action="buscador.php" method="get">
    <input type="radio" name="tipo" value="p" checked> Películas<br>
    <input type="radio" name="tipo" value="s"> Series<br>
    <input type="text" name="buscar" value="">
    <button type="submit" name="button">Buscar</button>
    </form>

    <ul>
      <?php if (isset($results)): ?>
      <?php foreach ($results as $result): ?>
        <li><?=$result['title']?></li>
      <?php endforeach; ?>
          <?php endif; ?>
    </ul>

    <a href="index.php">Volver</a>


  </body>
</html>
