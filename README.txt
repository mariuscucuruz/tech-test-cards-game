PHP Developer Code Test.

The following are the instructions for PHP coding test. You have 3 hours to complete this test. Please zip your solution and send it back to me within 3 hours of receiving this. Please reply to this email and confirm receipt.


PHP test
==========
Please take no more than the assigned time to work through as much of this as you can. Do not worry too much about completing everything - if you run out of time feel free to include any design notes indicating how you were planning to approach the implementation. Focus on the game logic instead of the UI.


Design a class (or classes) to represent playing cards
------------------------------------------------------

A playing card may be a standard card or a joker.

A standard card has a suit which is:  Heart, Diamond, Spade or Club

A standard card has a value which is:  2, 3, 4, 5, 6, 7, 8, 9, 10, Jack, Queen, King or Ace

A joker has no suit.

You should provide a suitable constructor for a card.

A card object should be able to print a representation of itself, in the form: "Ace of Hearts", "7 of Spades", "King of Diamonds", etc.


Define a means of checking the value-equivalence of cards
---------------------------------------------------------

Write a function which decides if two cards are equivalent.

Two cards are equivalent if they have the same value, or if either of the cards is a joker.

EXECUTING A SINGLE-PLAYER GAME OF PELMANISM
===========================================

Next, write a program that simulates a one-player game of Pelmanism ('Pairs'), with your program as the player.

Generate a pack of cards
------------------------

A pack of cards comprises each of the thirteen values (2, 3... King, Ace) in each of the four suits - plus two jokers.

Shuffle the cards
-----------------

Shuffle your 54 cards into a reasonably random order.

Pick as many pairs as you can find
----------------------------------

When played by a human with real cards, all the cards are face-down. The player picks pairs randomly, one card at a time. If the two cards are equivalent, they can be removed and placed in the bank. If they are not equivalent, they are put back where they came from, face-down.

Decent players will remember the value of previously-seen unmatched cards - so if the player picks a 7 and a 9, they won't match - but later, when he/she picks a new pair and the first card is a 7, he/she will remember that another 7 has been seen in a different location, and pick that to form
a matching pair.