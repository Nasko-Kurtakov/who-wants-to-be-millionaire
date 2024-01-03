<?php

namespace models;

use Serializable;


class Game implements Serializable
{
    //id,pass,username,name,usertype
    private $questions;
    private $currentIndex;

    private $isInProgress = false;

    public function __construct($questions)
    {
        $this->questions = $questions;
        $this->currentIndex = 0;
        $this->isInProgress = false;
    }

    public function getQuestion()
    {
        return $this->questions[$this->currentIndex];
    }

    public function questionNumber()
    {
        return $this->currentIndex + 1;
    }

    public function nextQuestion()
    {
        $this->currentIndex++;
    }

    public function startGame()
    {
        $this->isInProggress = true;
    }

    public function isGameInProgress()
    {
        return $this->isInProgress;
    }

    public function serialize()
    {
        $serialized = serialize([
            'questions' => $this->questions,
            'currentIndex' => $this->currentIndex,
            'isInProgress' => $this->isInProgress
        ]);

        return $serialized;
    }

    public function unserialize($data)
    {
        $unserializedData = unserialize($data);
        $this->questions = $unserializedData['questions'];
        $this->currentIndex = $unserializedData['currentIndex'];
        $this->isInProgress = $unserializedData['isInProgress'];
    }
}