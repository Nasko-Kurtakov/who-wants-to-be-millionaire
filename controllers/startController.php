<?php
require_once "../models/Game.php";
require_once "../models/Question.php";
require_once "../models/Database.php";

use models\Game;
use models\Question;
use models\Database;

session_start();

function createGame()
{
    $db = new Database();

    $questions = $db->getQuestions();

    $game = new Game($questions);

    $game->startGame();
    $_SESSION["game"] = $game;

    header('Location: ../views/gamePage.php');
}
createGame();
