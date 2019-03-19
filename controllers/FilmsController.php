<?php
/**
 *
 */
class FilmsController extends AbstractController
{
  private $db;
  public function __construct()
  {
    $this->db = MysqlDbProvider::getConnection('localhost', 'films', 'root', '1234');
  }

  public function list($args)
  {
    if($this->isPost())
    {
      $args = $this->db->query('select * from films where title like "%'.$_POST['filter'].'%"
      or id in (select film_id from films_by_stars where star_id in
      (select id from stars where first_name like "%'.$_POST['filter'].'%" or
      last_name like "%'.$_POST['filter'].'%")) order by title asc')->fetchAll();
    }
    else {
      $args = $this->db->query('select * from films order by title asc')->fetchAll();
    }
    $this->renderTemplate('views/films/List.php',$args);
  }

  public function view($args)
  {
    $args = array('film' => $this->db->query('select * from films where id='.$args[0])->fetch(),
    'stars' => $this->db->query('select * from stars inner join films_by_stars on
    stars.id = films_by_stars.star_id where films_by_stars.film_id = '.$args[0]));
    $this->renderTemplate('views/films/View.php',$args);
  }

  public function add($args)
  {
    if($this->isPost())
    {
      $this->db->query('insert into films values (default, "'.$_POST['title'].'", "'.$_POST['year'].'", "'.$_POST['format'].'")');
      $filmId = $this->db->lastInsertId();
      foreach ($_POST['actors'] as $actor) {
        $this->db->query("insert into films_by_stars values (default, ".$filmId.", $actor)");
      }
    }
    $actors = $this->db->query('select * from stars')->fetchAll();
    $this->renderTemplate('views/films/Add.php', $actors);
  }

  public function remove($args)
  {
      $this->db->query('delete from films_by_stars where film_id = '.$args[0]);
      $this->db->query('delete from films where films.id = '.$args[0]);
  }

  public function import($args)
  {
    if($this->isPost())
    {
       $result = FilmsParser::parseFile($_FILES['films']['tmp_name']);
       //echo var_dump($result);
       foreach ($result as $film) {
         $this->db->query('insert into films values(default, "'.$film['Title'].'",
         "'.$film['Release Year'].'", "'.$film['Format'].'" )');
         $filmId = $this->db->lastInsertId();
         foreach ($film['Stars'] as $star) {
           $name = explode(' ', $star);
           $this->db->query('insert into stars values (default, "'.$name[0].'",
           "'.$name[1].'")');
           $starId = $this->db->lastInsertId();
           $this->db->query("insert into films_by_stars values (default, $filmId,
           $starId)");
         }
       }
    }
    $this->renderTemplate('views/films/Import.php');
  }

  public function getControllerFileName()
  {
    return $_SERVER['PHP_SELF'];
  }

}


 ?>
