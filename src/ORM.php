<?php

/**
 *
 */
class ORM
{
  private $db;
  private $obj;
  public function __construct($db, IActiveRecord $obj)
  {
    $this->db = $db;
    $this->obj = $obj;
  }
  public function find($id)
  {
    return $this->mapping($this->db->query('select * from '.$this->obj->getTableName().' where id = '.$id)->fetchAll(PDO::FETCH_ASSOC))[0];
  }
  public function findAll()
  {
    return $this->mapping($this->db->query('select * from '.$this->obj->getTableName())->fetchAll(PDO::FETCH_ASSOC));
  }
  public function save()
  {
    if($id = $this->find($obj->getId())) {
      $keys = $this->obj->getColumnNames();
      $str = '';
      foreach ($keys as $key) {
        $str.='"'.$key.'" = "'.$this->obj->{'get'.$key}().'",';
      }
      trim($str, ',');
      $this->db->query('update '.$obj->getTableName().' set '.$str.' where id = '.$id);
    }
    else {
      $keys = $this->obj->getColumnNames();
      $str = '';
      foreach ($keys as $key) {
        $str.='"'.$this->obj->{'get'.$key}().'",';
      }
      trim($str, ',');
      $this->db->query('insert into '.$this->obj->getTableName().' values (default, '.$str.')');
    }
  }
  private function mapping($vals)
  {
    $record = array();
      foreach ($vals as $val) {
        $new_obj = new ReflectionClass($this->obj);
        $record [] = $new_obj->newInstance();
        foreach ($val as $key => $value) {
          end($record)->{'set'.$key}($value);
        }
    }
    return $record;
  }
}


 ?>
