<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\DomainModels\RemainingDate;
use App\DomainModels\Participant;

class ParticipantTest extends TestCase
{
    private $participant;

    public function setUp()
    {
        parent::setUp();
        $this->participant = new Participant(
            'name',
            'mail',
            '2018/5/2',
            (new RemainingDate('2018/5/1'))->calcRemainingDate('2018/5/2'),
            ''
        );

    }

    public function test_Participantの配列を取得する()
    {
        $expected = array(
            'name' => array(
                'correspondingDate' => '2018/5/2',
                'remainDate' => 1,
                'message' => ''
            )
        );

        $actual = $this->participant->getParticipantArray();

        $this->assertSame($expected, $actual);

    }

    public function test_残り日数算出_1日前()
    {
        $expected = 1;
        $actual = $this->participant->getRemainDate();

        $this->assertSame($expected, $actual);

    }

}
