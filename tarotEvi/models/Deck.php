<?php
class Deck {
  private $tarotDeck;

  function __construct()
  {
    $tarotDeck = array();
    $n = 78;
    for ( $i = 0, $i < $n; $i++ )
    {
      $card = new Card( $i, "", "" );
      tarotDeck[$i] = $card;
    }
  }

  function get_yes_no() // return a card object
  {
    $random = rand( 0, 77 );
    return $tarotDeck[ $random ];
  }




}

?>
