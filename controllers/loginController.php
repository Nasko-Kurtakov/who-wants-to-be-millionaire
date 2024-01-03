<?php
require_once "../models/Game.php";
require_once "../models/Question.php";
require_once "../models/Database.php";
require_once "../models/User.php";

use models\User;
use models\Database;
use models\Game;

session_start();

function login()
{
    $userData = json_decode(file_get_contents("php://input"), true);

    $db = new Database();

    $dbUser = $db->loginUser($userData["email"], $userData["password"]);

    $user = new User($dbUser["user_id"], $dbUser["email"]);

    $_SESSION["user"] = $user;

    echo json_encode(
        array(
            "email" => $user->getEmail(),
        )
    );
}

login();
