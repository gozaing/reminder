<?php

namespace App\DomainModels;

class Participant
{
    private $name;
    private $mail;
    private $correspondingDate;
    private $remainDate;
    private $message;

    public function __construct($name, $mail, $date, $remainingDate, $message) {
        $this->name = $name;
        $this->mail = $mail;
        $this->correspondingDate = $date;
        $this->remainDate = $remainingDate;
        $this->message = $message;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getCorrespondingDate()
    {
        return $this->correspondingDate;
    }

    public function getRemainDate()
    {
        return $this->remainDate;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getParticipantArray()
    {
        return array(
            $this->name => array(
                'correspondingDate' => $this->correspondingDate,
                'remainDate' => $this->getRemainDate(),
                'message' => $this->getMessage()
            )
        );

    }

    public function isRemainder()
    {
        if ($this->message !== '') {
            return true;
        } else {
            return false;
        }

    }

}