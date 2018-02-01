<?php
namespace App\Services;

use App\DomainModels\Participant;
use App\DomainModels\ParticipantList;
use App\DomainModels\RemainingDate;
use App\Repositories\ParticipantRepositoryInterface;

class ParticipantService implements ParticipantServiceInterface
{
    private $repo;
    private $list;

    public function __construct(ParticipantRepositoryInterface $repo)
    {
        $this->repo = $repo;
        $this->list = $this->repo->getParticipantList();
    }

    public function getList()
    {
        return $this->createParticipantListObj($this->list);
    }

    public function getArrayList()
    {
        $participantListObj = $this->createParticipantListObj($this->list);
        return $participantListObj->getList();
    }

    private function createParticipantListObj($participantList)
    {
        $participantListObj = new ParticipantList();

        foreach ($participantList as $participantName => $participantDetail) {

            $remainingDate =
                (new RemainingDate())->calcRemainingDate($participantDetail['correspondingDate']);

            // Factory にしても良い
            $participantObj = new Participant(
                $participantName,
                $participantDetail['mail'],
                $participantDetail['correspondingDate'],
                $remainingDate,
                $this->createComment($remainingDate)
            );

            $participantListObj->add($participantObj);
        }

        return $participantListObj;
    }

    public function createComment($remainDate)
    {
        $eventList = $this->repo->getEventList();

        if (array_key_exists($remainDate, $eventList)) {
            return $eventList[$remainDate];
        }

        return '';
    }
}
