<?php

class FilmsParser
{
  public static function parse($input)
  {
    $result = array();
    $lines = explode(PHP_EOL, $input);
    $count = 0;
    foreach ($lines as $line) {
      if(!$line) {
        $count++;
        continue;
      }
      $r = explode(':', $line);
      $vals = explode(',', trim($r[1]));
      for ($i = 0, $size = count($vals); $i < $size; $i++) {
        $vals[$i] = trim($vals[$i]);
      }
      $result[$count][trim($r[0])] = count($vals) > 1 ? $vals : $vals[0];
    }
    return $result;
  }
  public static function parseFile($filename)
  {
    return static::parse(file_get_contents($filename));
  }
}

 ?>
