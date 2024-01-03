<?php
require_once "../models/Game.php";
require_once "../models/Question.php";

session_start();
if (isset($_SESSION['game'])) {
    $game = $_SESSION['game'];
    $answer = json_decode(file_get_contents("php://input"), true);

    $q = $game->getQuestion();
    $isCorrect = $q->isCorrect($answer["answeredIndex"]);

    if ($isCorrect) {
        $game->nextQuestion();
        $_SESSION['game'] = $game;
        echo json_encode(
            array(
                "isCorrect" => true
            )
        );
    }
} else {
    // echo 'nope';
    echo json_encode(
        array(
            "isCorrect" => false
        )
    );
}




