<?php
namespace Tests\Unit;

use \Mockery as m;
use Tests\TestCase;
use App\Services\ParticipantServiceInterface;

class ParticipantListControllerTest extends TestCase
{
    private $mock;

    public function setUp()
    {
        parent::setUp();
        $this->mock = m::mock(ParticipantServiceInterface::class);
    }

    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function test_ステータスコード正常()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    public function test_indexでサービスクラスがCallされる_mock版()
    {
        // 1回 call される事が確認出来るのはどういうメリットがあるか？
        // -> ビジネスロジック（サービス）が正しくcallされているか？というレベルの確認で良いのでは。
        $this->mock->shouldReceive('getArrayList')->once(); // 1回呼び出される事を期待

        // Service Interface を注入しているが、特に同様の処理がない場合は実装に依存しても良い
        // -> ○○リストというのが並ぶような場合は interface は同一の定義をしておいた方が良いと思う

        // ServiceInterface が call されたら、 $this->>mock を返すようにする
        $this->app->instance(
            ParticipantServiceInterface::class,
            $this->mock);

        $this->call('GET', '/');
    }

    public function test_indexでサービスクラスがCallされる_stub版()
    {
        $this->app->bind(
            ParticipantServiceInterface::class,
            ParticipantStubService::class
        );
        $this->call('GET', '/');
    }
}

class ParticipantStubService implements ParticipantServiceInterface
{
    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function getArrayList()
    {
        // TODO: Implement getArrayList() method.
    }
}
