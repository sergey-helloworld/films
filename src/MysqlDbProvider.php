<?php

class MysqlDbProvider
{
  static function getConnection($host, $dbName, $user, $pass)
  {
    return new PDO("mysql:dbname=$dbName;host=$host", $user, $pass);
  }
}

 ?>
