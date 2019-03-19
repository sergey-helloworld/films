<html>
<head>
  <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/js/actions.js"></script>
</head>
<body>

<form method="post" action="<?=$selfController?>">
<input size="20" name="filter" placeholder="Фильтр">
<input type="submit">
</form>
<button name="import">Импорт</button>
<button name="add">Добавить</button>

<table>
  <tr>
    <th>Название</th>
    <th>Год</th>
    <th>Формат</th>
    <th>Действия</th>
  </tr>

<?php

foreach ($args as $value) {
  echo '<tr data-id="'.$value['id'].'"><td>'.$value['title'].'</td><td>'.$value['year'].'</td><td>'.$value['format'].'</td>'.
  '<td><button name="view">Инфо</button> <button name="delete">Удалить</button></td></tr>';
}

 ?>

</table>

</body>
</html>
