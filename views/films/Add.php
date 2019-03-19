<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <form method="post" action="<?=$selfController?>">
    <input size="20" name="title" placeholder="Название" required></br>
    <input size="20" name="year" placeholder="Год выпуска" required></br>
    <input size="20" name="format" placeholder="Формат" required></br>
    <select placeholder="Актеры" name="actors[]" multiple>
      <?php
        foreach ($args as $actor) {
          echo '<option value="'.$actor['id'].'">'.$actor['first_name'].' '.$actor['last_name'].'</option>';
        }
      ?>
    </select>
    <input type="submit">
  </form>
  <a href="/index.php">На главную</a>
</body>
</html>
