<?php

namespace App\Http\Controllers;

use App\Services\ParticipantServiceInterface;

class ParticipantListController extends Controller
{

    private $service;

    public function __construct(ParticipantServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $participantList = $this->service->getArrayList();

        return view('list')->with('participantList', $participantList);
    }

}
