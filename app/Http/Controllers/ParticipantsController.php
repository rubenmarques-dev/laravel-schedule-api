<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParticipantRequest;
use App\Http\Resources\ParticipantResource;
use App\Models\Participant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class ParticipantsController extends Controller
{
    public function index(){
        $participants = Participant::all();
        return  ParticipantResource::collection($participants);
    }

    public function store(StoreParticipantRequest $request){
            $data = $request->validationData();
            $participant = Participant::create($data);
            return new ParticipantResource($participant);
    }
}
