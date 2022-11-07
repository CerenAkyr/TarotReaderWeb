<?php
class Card {
  private $id;
  private $name;
  private $meaning;

  function __construct( $id, $name, $meaning )
  {
    $this -> id = $id;
    $this -> name = $name;
    $this -> meaning = $meaning;
  }

  function get_name()
  {
    return $this -> name;
  }

  function get_id()
  {
    return $this -> id;
  }

  function get_meaning()
  {
    return $this -> meaning;
  }

  function set_meaning( $meaning )
  {
    $this -> meaning = $meaning;
  }

  function set_name( $name )
  {
    $this -> name = $name;
  }
}

?>
