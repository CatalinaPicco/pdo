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

//$stmt_gen->BindValue(':id', $_GET['id'], PDO::PARAM_STR);

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Agregar película</h1>

    <h3>Detalles</h3>
    <form class="" action="add-movie.php" method="post">
      <label for="title">Titulo</label>
      <input type="text" id=title name="title" value="">
      <br>
      <label for="title">Raring</label>
      <input type="text" id=rating name="rating" value="">
      <br>
      <label for="release_date">Fecha de estreno</label>
      <small>Debe tener el formato "YYYY-MM-DD"</small>
      <input type="text" id=release_date name="release_date" value="">
      <br>
      <label for="genre">Género</label>
      <select class="" id="genre" name="genre">
        <?php foreach ($genres as $oneGenre): ?>
          <option value="<?=$oneGenre['id']?>"><?=$oneGenre['name']?></option>
        <?php endforeach; ?>
      </select>
      <br>
      <label for="length">Duración</label>
      <input type="number" id="length" name="length" value="">
      <br>
      <button type="submit" name="button">Enviar</button>
    </form>
    <a href="index.php">Volver</a>
  </body>
</html>
