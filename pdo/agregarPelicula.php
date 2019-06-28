<?php

require_once('guardar.php');

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
    <form class="" action="agregarPelicula.php" method="post">
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
