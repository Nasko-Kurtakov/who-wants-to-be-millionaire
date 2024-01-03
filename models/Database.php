<?php
namespace models;

use \PDO;

class Database
{
    private $connection;

    public function __construct()
    {
        $host = 'localhost';
        $db = 'test_01';
        $user = 'hwtbmAdmin';
        $pass = 'admin';

        try {
            $this->connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getQuestions()
    {
        $queryString = "SELECT
                            q.question_text,
                            q.correct_answer,
                            GROUP_CONCAT(a.answer_text SEPARATOR ';') AS answer_texts
                        FROM
                            (SELECT DISTINCT
                                id
                            FROM
                                question
                            ORDER BY
                                RAND()
                            LIMIT
                                10) random_questions
                        JOIN
                            question q ON random_questions.id = q.id
                        JOIN
                            answers a ON q.id = a.question_id
                        GROUP BY
                            q.id";
        $stmt = $this->connection->prepare($queryString);
        $stmt->execute();
        $dbQuestions = $stmt->fetchAll();

        $questions = array_map(function ($q) {
            return new Question($q["question_text"], explode(';', $q["answer_texts"]), $q["correct_answer"]);
        }, $dbQuestions);

        return $questions;
    }

    public function registerUser($email, $password)
    {
        $queryString = "INSERT INTO Users (email, password) VALUES (?, ?)";

        try {
            $stmt = $this->connection->prepare($queryString);
            $success = $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT)]);

            return $success;
        } catch (PDOException $e) {
            // Handle the exception (e.g., log it or return false)
            return false;
        }
    }


    public function loginUser($email, $password)
    {
        $queryString = "SELECT user_id, email, password FROM Users WHERE email = ?";
        $stmt = $this->connection->prepare($queryString);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            return $user;
        } else {
            // Login failed
            return false;
        }
    }
}