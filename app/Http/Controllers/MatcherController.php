<?php

namespace App\Http\Controllers;

use App\Domain\SearchEngine\Matcher;
use App\Repositories\Event\EventRepository;
use App\Repositories\Event\ParticipantRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class MatcherController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository, ParticipantRepository $participantRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->participantRepository = $participantRepository;
    }

    public function index()
    {
        try {
            DB::beginTransaction();

            $Participant = $this->participantRepository->getParticipant(Auth::id());
            $AvailableCarpools = $this->eventRepository->getAvailableCarpools($Participant);

            DB::commit();

            $Matcher = new Matcher($Participant, $AvailableCarpools);
            $nearestCarpools = $Matcher->execute();

            return Response::make($nearestCarpools, 200);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
