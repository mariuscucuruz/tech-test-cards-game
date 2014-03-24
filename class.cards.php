<?php
class Cards {
	/**
	* An array that holds all the errors for return to the user if required
	*@access public
	*$var array
	*/
	public $errors = array();

	/**
	* Array to hold the cards suits
	* static
	*/
	static $suits = array('diamonds' => 0, 'hearts' => 1, 'clubs' => 2, 'spades' => 3);//spades (?), hearts (?), diamonds (?) and clubs (?).

	/**
	* Array to hold named cards : Jack, Queen, King or Ace + Joker
	* static
	*/
	static $namedCards = array(11 => 'jack', 12 => 'queen', 13 => 'king', 14 => 'ace', 0 => 'joker');//Jack, Queen, King, Ace, Joker

	/**
	* Array to hold the cards so we won't use a DB
	* protected
	*/
	protected $pack = array(); //substitute for a DB
													/* eg: 11 => array ("cardName" => "jack",
																							"cardValue" => 11,
																							"cardSuits" => array() $suits
																							), */

	/**
	* Instantiates the Cards class 
	* @return array with all the cards
	*/
	function __construct() {
					//create the pack
					$countCards = 0;
					$cardName = '';

					//add the Joker first
					$this->pack[0] = array ("cardName" => 'joker', "cardValue" => 0, "cardSuits" => array());

					for ($countCards = 2; $countCards <= 14; $countCards++)
					{
							//if there's a name for this card use it when adding it in the pack
							$cardName = isset(self::$namedCards[$countCards]) ? self::$namedCards[$countCards] : $countCards;

							foreach (self::$suits as $suitName)
							{
								//add each card with its suit to the pack
								//$this->pack[$countCards] = array ( //use card value as identifier
								$this->pack[$cardName] = array ( //use card name as identifier
																									"cardName" => $cardName,
																									"cardValue" => $countCards,
																									"cardSuits" => self::$suits
																									);
							}
					}
			return $this->pack;
	}

	/**
	* Returns an array with all the cards 
	* @return array with all the cards
	*/
	function getFullPack() {
			return $this->pack;
	}


	/**
	* Compares two cards. Each card is an array in the form card('Ace', 'spades') or card('7', 'Diamonds')
	*
	* @param $card1 array with the details of the 1st card
	* @param $card2 array with the details of the 2nd card
	*
	* @return true is $card1 is bigger than $card2, otherwise false
	*/
	public function compareCards($card1, $card2) {
			if (!(is_array($card1) && count($card1) == 2)) {
				return "first card is invalid";
			}
			if (!(is_array($card2) && count($card2) == 2)) {
				return "second card is invalid";
			}

			//1st card:
			$valueCard1 = $this->pack[$card1[0]]['cardValue'];
			$suitCard1 = $this->pack[$card1[0]]['cardSuits'][$card1[1]];
			//2nd card:
			$valueCard2 = $this->pack[$card2[0]]['cardValue'];
			$suitCard2 = $this->pack[$card2[0]]['cardSuits'][$card2[1]];

			if ($valueCard1 == $valueCard2) {
					//same value -> decide on the suit
					if ($suitCard1 == $suitCard2) {
							return array ("value" => false, "msg" => "someone's cheating here!!!");
					} elseif ($suitCard1 > $suitCard2) {
							return array ("value" => true, "msg" => "card #1 wins on account of suit (". $card1[1] ." is greater than ". $card2[1] .")");
					} else {
							return array ("value" => false, "msg" => "card #2 wins on account of suit (". $card2[1] ." is greater than ". $card1[1] .")");
							return false;
					}
			} elseif ($valueCard1 > $valueCard2) {
					return array ("value" => true, "msg" => "card #1 wins");
			} else {
					return array ("value" => false, "msg" => "card #2 wins");
			}
			return "hmmm.... error???";
	}

	/**
	* generates a random card
	*
	*
	* @return array in the form of array('ace', 'spades')
	*/
	public function getRandomCard () {
			$cardName = array_rand($this->pack);
			$cardSuit = array_rand($this->pack[$cardName]['cardSuits']);
			return array($cardName, $cardSuit);

	}
}