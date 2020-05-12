<?php
class CreateGame
{
  private $_bdd;

  private $_numGame;

  private $_word;
  private $_wordHidden;
  private $_wordLength;

  public function __construct($bdd)
  {
    $this->setDb($bdd);
  }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  public function createParty()
  {
    $testExiste = 1;
    while($testExiste != 0){
      $NumberRandow = $this->randomPartyNumber();
      $queryRandomNumber = $this->_bdd->query("SELECT COUNT(numGame) AS test FROM game WHERE numGame='$NumberRandow'");
  	  $rowRandomNumber = $queryRandomNumber->fetch(PDO::FETCH_ASSOC);
      $testExiste = $rowRandomNumber['test'];
    }

    $this->_numGame = $NumberRandow;
    $this->randomWord();

    $queryCreateRandomParty = $this->_bdd->exec("INSERT INTO game(numGame, word, wordHidden, wordLength, attempt, attemptImage) VALUES ('$this->_numGame', '$this->_word', '$this->_wordHidden', '$this->_wordLength', '0', '0')");
    return $this->_numGame;

  }

  public function randomWord()
  {
    $queryWordRandom = $this->_bdd->query("SELECT word, hidden FROM data_word ORDER BY RAND() LIMIT 1");
	  $rowWordRandom = $queryWordRandom->fetch(PDO::FETCH_ASSOC);
    $this->_word = $rowWordRandom['word'];
    $this->_wordHidden = $rowWordRandom['hidden'];
    $this->_wordLength = strlen($rowWordRandom['word']);
  }

  public function randomPartyNumber($length = 4)
  {
		$numberList = '0123456789';
		$lengthMax = strlen($numberList);
		$randomList = '';
		for ($i = 0; $i < $length; $i++)
		{
		$randomList .= $numberList[rand(0, $lengthMax - 1)];
		}
		return $randomList;
  }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  public function setDb(PDO $db)
  {
    $this->_bdd = $db;
  }

}
 ?>
