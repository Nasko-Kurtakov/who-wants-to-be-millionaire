<?php
namespace libs;

use models\Question;
use \PDO;

class Db
{
    private $connection;
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $db = 'hwtbm';
        $user = 'hwtbmAdmin';
        $pass = 'admin';

        try {
            $this->connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e;
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getQuestions($number)
    {
        $selectString = "SELECT
                            q.question_id,
                            q.question_text,
                            q.correct_answer,
                            q.difficulty_level,
                            GROUP_CONCAT(a.answer_text SEPARATOR ';') AS answer_texts
                        FROM
                            (SELECT DISTINCT
                                question_id
                            FROM
                                Questions
                            ORDER BY
                                RAND()
                            LIMIT
                                10) random_questions
                        JOIN
                            Questions q ON random_questions.question_id = q.question_id
                        JOIN
                            Answers a ON q.question_id = a.question_id
                        GROUP BY
                            q.question_id
                        ORDER BY
                            q.difficulty_level";

        $query = $this->connection->prepare($selectString);

        $query->execute();
        $dbQuestions = $query->fetchAll();

        $questions = array_map(function ($question) {
            $answers = explode(";", $question["answer_texts"]);
            return new Question($question["question_text"], $answers, $question["correct_answer"]);
        }, $dbQuestions);

        return $questions;
    }
}