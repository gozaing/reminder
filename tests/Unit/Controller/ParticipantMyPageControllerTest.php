<?php
namespace Tests\Unit;

use Tests\TestCase;

class ParticipantMypageControllerTest extends TestCase
{
    public function test_ステータスコード正常()
    {
        $response = $this->call('GET', '/mypage');
        $this->assertEquals(200, $response->status());
    }
}
