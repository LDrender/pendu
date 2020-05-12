<?php
 class Party
 {

   private $_bdd;

   private $_numGame;

	 private $_word;
	 private $_wordHidden;
   private $_wordLength;

	 private $_letterUsed;
	 private $_attempt;
   private $_attemptImage;

   private $_endGame;

   CONST ALPHABET = "abcdefghijklmnopqrstuvwyxz";

   public function __construct($db, $numGame)
   {
     $this->setDb($db);
     $this->setStartParty($numGame);
   }


   public function numGame()
   {
     return $this->_numGame;
   }
   public function wordHidden()
   {
     return $this->_wordHidden;
   }
   public function attempt()
   {
     return $this->_attempt;
   }
   public function attemptImage()
   {
     return $this->_attemptImage;
   }
   public function letterUsed()
   {
     return $this->_letterUsed;
   }
   public function endGame()
   {
     return $this->_endGame;
   }

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	public function keyboardDisplay()
	{
    $tableTouche[] = '<div class="12u 12u$(small) test">';

    for ($i = 0; $i < 26;)
    {
      if(strrpos('.'.$this->_letterUsed, SELF::ALPHABET[$i]))
      {
        $keyLetter = '<input class="size button disabled" type="submit" name="letter" value="'.SELF::ALPHABET[$i].'" />';
      }
      else
      {
        $keyLetter = '<input class="size" type="submit" name="letter" value="'.SELF::ALPHABET[$i].'" />';
      }

  	  $tableTouche[] = $keyLetter;
      $i++;
    }
    $tableTouche[] = '</div>';

    $letterTouch = implode("\n", $tableTouche). "\n";
    return $letterTouch;
	}


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	public function checkLetter($sendLetter)
	{
		if(strstr($this->_word, $sendLetter))
		{
      $this->setLetterUsed($sendLetter);

			for($i = 0; $i < $this->_wordLength;)
      {
				if($this->_word[$i] == $sendLetter)
				{
					$this->_wordHidden[$i] = $sendLetter;
				}
				$i++;
			}

      $this->setWordHidden($this->_wordHidden);

                      //Check you win or send _wordHidden on your game.
      $checkWin = strrpos(".".$this->_wordHidden, "_");
      if($checkWin == FALSE)
      {
        $this->setEndGame("win");
        $_SESSION["endgame"] = $this->_endGame;
        header("location: ./end");
      }
      else
      {
        $this->_bdd->exec("UPDATE game SET wordHidden='$this->_wordHidden', letterUsed='$this->_letterUsed' WHERE numGame='$this->_numGame' ");
        return [
          'wordHidden' => $this->_wordHidden,
          'attemptImage' => $this->_attemptImage
        ];
      }

		}
		else
		{
			$this->setAttempt();
      $this->setAttemptImage();

			if($this->_attempt >= 8)
			{
                      //Return end game because you loose, too much error
        $this->setEndGame("lose");
        $_SESSION["endgame"] = $this->_endGame;
        header("location: ./end");
			}
			else
			{
				$this->_letterUsed = $this->_letterUsed.$sendLetter;

                      //Return NumImage, to change this on your party.
        $this->_bdd->exec("UPDATE game SET letterUsed='$this->_letterUsed', attempt='$this->_attempt', attemptImage='$this->_attemptImage' WHERE numGame='$this->_numGame' ");
        return
        [
          'wordHidden' => $this->_wordHidden,
          'attemptImage' => $this->_attemptImage
        ];
			}
		}

	}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function checkWord($sendWord)
	{
                      //Check you win or send _wordHidden on your game.
    if($this->_word == $sendWord)
    {
      $this->setEndGame("win");
      $_SESSION["endgame"] = $this->_endGame;
      header("location: ./end");
    }
    else
    {
      $this->_attempt++;
      $this->_attemptImage++;

      if($this->_attempt >= 8)
      {
                      //Return end game because you loose, too much error
        $this->setEndGame("lose");
        $_SESSION["endgame"] = $this->_endGame;
        header("location: ./end");
      }
      else
      {
                      //Return NumImage, to change this on your party.
        $this->_bdd->exec("UPDATE game SET attempt='$this->_attempt', attemptImage='$this->_attemptImage' WHERE numGame='$this->_numGame' ");
        return
        [
          'wordHidden' => $this->_wordHidden,
          'attemptImage' => $this->_attemptImage
        ];
      }
    }
	}

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  public function setStartParty($numGame)
  {
    $gameSelect = $this->_bdd->query("SELECT * FROM game WHERE numGame='$numGame'");
    $game = $gameSelect->fetch(PDO::FETCH_ASSOC);
    $this->setParty($game);
  }

  public function setDb(PDO $db)
  {
    $this->_bdd = $db;
  }

  public function setEndGame(string $state)
  {
    if($state == "win")
    {
      $this->_endGame =
      [
        'title' => "You Win",
        'text' => "gagné",
        'state' => $state,
        'attempt' => $this->_attempt,
        'image' => "win.png",
        'word' => $this->_word,
        'numGame' => $this->_numGame
      ];
      header("location: ./end");
    }
    elseif($state == "lose")
    {
      $this->_endGame =
      [
        'title' => "Game Over",
        'text' => "perdu",
        'state' => $state,
        'attempt' => $this->_attempt,
        'image' => $this->_attemptImage.'.png',
        'word' => $this->_word,
        'numGame' => $this->_numGame
      ];
      header("location: ./end");
    }
  }

  public function setParty(array $infoGame)
  {
    $this->_numGame =       $infoGame['numGame'];

    $this->_word =          $infoGame['word'];
    $this->_wordHidden =    $infoGame['wordHidden'];
    $this->_wordLength =    $infoGame['wordLength'];

    $this->_letterUsed =    $infoGame['letterUsed'];
    $this->_attempt =       $infoGame['attempt'];
    $this->_attemptImage =  $infoGame['attemptImage'];
  }

  public function setWordHidden(string $WordHidden)
  {
    $this->_wordHidden = $WordHidden;
  }
  public function setLetterUsed(string $LetterUsed)
  {
    $LetterUsed = $this->_letterUsed.$LetterUsed;
    $this->_letterUsed = $LetterUsed;
  }
  public function setAttempt()
  {
    $Attempt = $this->_attempt + 1;
    $this->_attempt = $Attempt;
  }
  public function setAttemptImage()
  {
    $AttemptImage = $this->_attemptImage + 1;
    $this->_attemptImage = $AttemptImage;
  }

 }
?>
