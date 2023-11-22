<?php
require_once "../models/Game.php";
require_once "../models/Question.php";

session_start();
if (isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
    var_dump($game);
} else {
    echo 'nope';
    // session_destroy();
    // header("../views/error.php");
}

$game->nextQuestion();
header('Location: ../views/gamePage.php');


