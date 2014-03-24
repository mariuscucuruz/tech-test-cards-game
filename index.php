<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once('class.cards.php');

$packOfCards = new Cards;
//echo "<pre>". print_r($packOfCards, true) ."</pre>";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Marius Cucuruz" />

	<title>Cards program</title>
</head>

<body>
<?php
echo "<h3>Testing the program:</h3>
			<ul>";
		$compare0 = $packOfCards->compareCards(array('3', 'hearts'), array('7', 'clubs'));
		echo "Is the <strong>3 of hearts</strong> greater than the <strong>7 of clubs</strong>?<br />".
					"<strong style='color: ". ($compare0['value'] ? 'green' : 'red') ."'>". $compare0['msg'] ."</strong>".
					"<br /><br />";
		
		$compare1 = $packOfCards->compareCards(array('ace', 'diamonds'), array('king', 'hearts'));
		echo "Is the <strong>Ace of diamonds</strong> greater than the <strong>King of hearts</strong>?<br />".
					"<strong style='color: ". ($compare1['value'] ? 'green' : 'red') ."'>". $compare1['msg'] ."</strong>".
					"<br /><br />";
		
		$compare2 = $packOfCards->compareCards(array('ace', 'hearts'), array('ace', 'clubs'));
		echo "Is the <strong>Ace of hearts</strong> greater than the <strong>Ace of clubs</strong>?<br />".
					"<strong style='color: ". ($compare2['value'] ? 'green' : 'red') ."'>". $compare2['msg'] ."</strong>".
					"<br /><br />";
		
		$compare3 = $packOfCards->compareCards(array('ace', 'spades'), array('ace', 'spades'));
		echo "Is the <strong>Ace of spades</strong> greater than the <strong>Ace of spades</strong>?<br />".
					"<strong style='color: ". ($compare3['value'] ? 'green' : 'red') ."'>". $compare3['msg'] ."</strong>".
					"<br /><br />";
echo "</ul>
			<hr />";
?>

<?php
if ($_POST) {
		echo "<h3>You chose to play a game...</h3>";
		if ($_POST['playCard'] != '') $playCard = explode(",", $_POST['playCard']);
		$userCard = (count($playCard) == 2) ? $playCard : $packOfCards->getRandomCard();
		//$userCard = $packOfCards->getRandomCard();
		$computerCard = $packOfCards->getRandomCard();

		$compareCards = $packOfCards->compareCards($userCard, $computerCard);
		echo "<p>You got the <strong>". $userCard[0] ." of ". $userCard[1] . "</strong> ".
						"and computer has the <strong>". $computerCard[0] ." of ". $computerCard[1]."</strong>".
						"</p>";
		echo "<p>".
					"<strong style='color: ". ($compareCards['value'] ? 'green' : 'red') ."'>". ($compareCards['value'] ? 'you win!' : 'you lost!') ."</strong><br />".
					"<em>". $compareCards['msg'] ."</em>".
					"</p><br /><br />";
}
?>
<form method="post" action="">
	<strong>Play a random card</strong>:&nbsp;
	<input type="hidden" name="play" id="play" value="yes" />
	<input type="submit" name="submit" id="submit" value="Pick a random card!" />
</form>
<br />
<form method="post" action="">
	<strong>or choose a card to play</strong>:
	<select name="playCard" id="playCard">
<?php foreach ($packOfCards->getFullPack() as $card) {
					foreach ($card['cardSuits'] as $cardSuitID => $cardSuitVal) {
							echo "<option value='". $card['cardName'] .",". $cardSuitID ."'>".
										"<strong style='text-transform: capitalize;'>". $card['cardName'] ."</strong>".
										" of <strong style='text-transform: capitalize;'>". $cardSuitID ."</strong>".
										"</option>";
					}
			} ?>
	</select>
	<input type="hidden" name="play" id="play" value="yes" />
	<input type="submit" name="submit" id="submit" value="Play this card!" />
</form>

</body>
</html>