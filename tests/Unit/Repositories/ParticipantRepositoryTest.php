<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\ParticipantRepositoryInterface;

class ParticipantRepositoryTest extends TestCase
{
    private $repo;

    public function setUp()
    {
        parent::setUp();
        $this->repo = $this->app->make(ParticipantRepositoryInterface::class);
    }

    public function test_RepositoryからConfigの取得を行う()
    {
        $expected = array(
            'test1' => array(
                'mail' => 'test1@example.com',
                'correspondingDate' => '2018/1/10',
            ),
            'test2' => array(
                'mail' => 'test2@example.com',
                'correspondingDate' => '2018/2/3',
            ),
            'test3' => array(
                'mail' => 'test3@example.com',
                'correspondingDate' => '2018/2/9',
            ),

        );

        $actual = $this->repo->getParticipantList();

        $this->assertSame($expected, $actual);
    }

    public function test_Repositoryからイベント日とコメントを取得()
    {
        $expected = array(
            10 => '10日前です',
            5 => '5日前です',
            1 => '1日前です',
        );

        $actual = $this->repo->getEventList();

        $this->assertSame($expected, $actual);
    }
}
