<?php

namespace App\DomainModels;

class ParticipantList
{
    private $list;

    public function __construct() {
        $this->list = array();
    }

    public function add(Participant $participant) {
        $this->list[] = $participant;
    }

    public function getList()
    {
        return $this->list;
    }
}