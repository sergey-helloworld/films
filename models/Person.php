<?php

include 'src/IActiveRecord.php';

class Person implements IActiveRecord
{
  private $tableName;
  private $columnNames;
  private $name;
  private $age;
  private $id;
  public function __construct($name = null, $age = null)
  {
    $this->tableName = 'Persons';
    $this->columnNames = array('Id', 'Name', 'Age');
    $this->name = $name;
    $this->age = $age;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getAge()
  {
    return $this->age;
  }
  public function setAge($age)
  {
    $this->age = $age;
  }
  public function getTableName()
  {
    return $this->tableName;
  }
  public function getColumnNames()
  {
    return $this->columnNames;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
}

 ?>
