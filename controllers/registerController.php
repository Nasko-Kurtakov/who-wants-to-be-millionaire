<?php
require_once "../models/Database.php";

use models\Database;

$userData = json_decode(file_get_contents("php://input"), true);

$db = new Database();

$db->registerUser($userData["email"], $userData["password"]);


echo json_encode(
    array(
        "email" => $userData["email"],
        "password" => $userData["password"]
    )
);