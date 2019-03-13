<?php



/**
 *
 */
class MainView
{

  public function __construct($args)
  {
    echo '<html><head></head><body>';

    foreach ($args as $value) {
      echo '<p>'.$value->getName().' '.$value->getAge().'</p>';
    }

    echo '</body></html>';

  }
}


 ?>
