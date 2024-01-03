<?php

namespace models;

use Serializable;

class Question implements Serializable
{
    //id,pass,username,name,usertype
    private $question = "";
    private $answers = [];
    private $correctAnswer = 0;

    public function __construct(string $question, array $answers, string $correct)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->correctAnswer = $correct;
    }

    public function isCorrect(string $answer): bool
    {
        return $answer == $this->correctAnswer;
    }

    public function getQuestionLabel()
    {
        return $this->question;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function serialize()
    {
        return serialize([
            'question' => $this->question,
            'answers' => $this->answers,
            'correctAnswerIndex' => $this->correctAnswer,
        ]);
    }

    public function unserialize($data)
    {
        $unserializedData = unserialize($data);
        $this->question = $unserializedData['question'];
        $this->answers = $unserializedData['answers'];
        $this->correctAnswer = $unserializedData['correctAnswerIndex'];
    }
}