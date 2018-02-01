<?php
namespace App\Http\Controllers;

use App\Services\ParticipantServiceInterface;

class ParticipantMyPageController extends Controller
{
    private $service;

    public function __construct(ParticipantServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $list = $this->service->getList();

        // mail 送信処理
        foreach ($list->getList() as $participant) {

            if ($participant->isRemainder()) {
                // 対象者と判断してメール送信
                // send mail ...
            }
        }
    }
}