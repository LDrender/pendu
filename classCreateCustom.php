<?php
class CreateGame
{
  private $_bdd;

  private $_numGame;

  private $_word;
  private $_wordHidden;
  private $_wordLength;

  private $_errorValue;

  public function __construct($bdd, $numParty, $wordSearch)
  {
    $this->setDb($bdd);
    $this->setWord($wordSearch);
    $this->setNumGame($numParty);
  }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  public function createParty()
  {

    $queryNumber = $this->_bdd->query("SELECT COUNT(numGame) AS test FROM game WHERE numGame='$this->_numGame'");
  	$rowNumber = $queryNumber->fetch(PDO::FETCH_ASSOC);
    if($rowNumber['test'] != 0)
    {
      return "Le numéro de partie est déjà utilisé.";
    }
    elseif($this->_errorValue == 1)
    {
      return "Le mot entré ne respecte pas les règles.";
    }
    else
    {
      $queryCreateRandomParty = $this->_bdd->exec("INSERT INTO game(numGame, word, wordHidden, wordLength, attempt, attemptImage) VALUES ('$this->_numGame', '$this->_word', '$this->_wordHidden', '$this->_wordLength', '0', '0')");
      return "Partie créée";
    }
  }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  public function setDb(PDO $db)
  {
    $this->_bdd = $db;
  }


  public function setWord(STRING $wordSearch)
  {
    $hidden_party = "";
		$error_value = 0;
		$alphabet = "abcdefghijklmnopqrstuvwyxz-";
		$longeur = strlen($wordSearch);

			for($i = 0; $i < $longeur;){

				if(preg_match(" /(?=.*[A-Z])/ " ,$wordSearch[$i])){
					$wordSearch[$i] = strtolower($wordSearch[$i]);
				}

				if((preg_match(" /(?=.*[a-z])/ " ,$wordSearch[$i])) or (preg_match(" /(?=.*[-])/ " ,$wordSearch[$i]))){
					if($wordSearch[$i] == "-"){
						$hidden_party = $hidden_party."-";
					}
					else{
						$hidden_party = $hidden_party."_";
					}
				}
				else{
					$error_value = 1;
				}
				$i++;
			}


			if($error_value == 1)
      {
				$this->_errorValue = 1;
			}
      else
      {
        $this->_word = $wordSearch;
        $this->_wordHidden = $hidden_party;
        $this->_wordLength = strlen($this->_word);
      }
  }


  public function setNumGame(STRING $numParty)
  {
    $this->_numGame = $numParty;
  }

}
 ?>
