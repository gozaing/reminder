<?php
namespace App\Repositories;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    public function getParticipantList()
    {
        return \Config::get('reminder.participant.list');
    }

    public function getEventList()
    {
        return \Config::get('reminder.event.list');
    }
}
