<?php

namespace models;

use Serializable;

class Game implements Serializable
{
    private $questions;

    private $currentQuestionIndex;

    public function __construct($questions)
    {
        $this->questions = $questions;
        $this->currentQuestionIndex = 0; //badddddd
    }

    public function getQuestion()
    {
        return $this->questions[$this->currentQuestionIndex];
    }

    public function nextQuestion()
    {
        $this->currentQuestionIndex += 1;
    }

    public function currentQuestionNumber()
    {
        return $this->currentQuestionIndex + 1;
    }

    public function serialize()
    {
        return serialize(
            array(
                "questions" => $this->questions,
                "currentQuestionIndex" => $this->currentQuestionIndex
            )
        );
    }

    public function unserialize($data)
    {
        $unserialized = unserialize($data);
        $this->questions = $unserialized["questions"];
        $this->currentQuestionIndex = $unserialized["currentQuestionIndex"];
    }
}