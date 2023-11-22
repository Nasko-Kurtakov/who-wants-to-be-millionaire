<?php

namespace models;

use Serializable;

class Question implements Serializable
{

    private $questionText;

    private $answers;

    private $correctAnswerIndex;

    public function __construct($questionText, $answers, $correctAnswer)
    {
        $this->questionText = $questionText;
        $this->answers = $answers;
        $this->correctAnswerIndex = $correctAnswer;
    }

    public function getQuestionText()
    {
        return $this->questionText;
    }

    public function getAnswers()
    {
        return $this->answers;
    }
    public function getCorrectIndex()
    {
        return $this->correctAnswerIndex;
    }

    public function isCorrect($indx)
    {
        return $indx == $this->correctAnswerIndex;
    }

    public function serialize()
    {
        return serialize(
            array(
                "questionText" => $this->questionText,
                "answers" => $this->answers,
                "correctAnswerIndex" => $this->correctAnswerIndex
            )
        );
    }

    public function unserialize($data)
    {
        $unserialized = unserialize($data);
        $this->questionText = $unserialized["questionText"];
        $this->answers = $unserialized["answers"];
        $this->correctAnswerIndex = $unserialized["correctAnswerIndex"];
    }
}