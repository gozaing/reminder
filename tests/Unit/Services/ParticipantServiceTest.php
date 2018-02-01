<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ParticipantServiceInterface;
use App\Repositories\ParticipantRepositoryInterface;
use App\DomainModels\Participant;
use App\DomainModels\ParticipantList;

class ParticipantServiceTest extends TestCase
{
    private $service;

    public function setUp()
    {
        parent::setUp();

        $this->app->bind(
            ParticipantRepositoryInterface::class,
            ParticipantStubRepository::class
        );

        $this->service = $this->app->make(ParticipantServiceInterface::class);
    }

    public function test_残日数とコメント_0日()
    {
        $remain_date = 0;
        $expected = '';

        $actual = $this->service->createComment($remain_date);

        $this->assertSame($expected, $actual);

    }

    public function test_残日数とコメント_5日()
    {
        $remain_date = 5;
        $expected = '5日前です';

        $actual = $this->service->createComment($remain_date);

        $this->assertSame($expected, $actual);
    }

    public function test_残日数とコメント_10日()
    {
        $remain_date = 10;
        $expected = '10日前です';

        $actual = $this->service->createComment($remain_date);

        $this->assertSame($expected, $actual);
    }

    public function test_参加者一覧用ParticipantListObject生成()
    {
        $actual = $this->service->getList();
        $this->assertInstanceOf(ParticipantList::class, $actual);
    }

    public function test_参加者一覧用ParticipantObject生成()
    {
        $actual = $this->service->getArrayList();
        $this->assertInstanceOf(Participant::class, $actual[0]);
    }

}

class ParticipantStubRepository implements ParticipantRepositoryInterface
{
    public function getEventList()
    {
        return array(
            10 => '10日前です',
            5 => '5日前です',
            1 => '1日前です'
        );
    }

    public function getParticipantList()
    {
        return array(
            'sample' => array(
                'mail' => 'mail@example.com',
                'correspondingDate' => '2018/4/1'
            )
        );
    }
}
