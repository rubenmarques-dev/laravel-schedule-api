<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meetings\StoreMeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{

    public function index(){
        $meetings = Meeting::all();
        return MeetingResource::collection($meetings);
    }

    public function show($meetingId){
        $meeting = Meeting::whereId($meetingId)->with('participants')->first();
        return new MeetingResource($meeting);
    }

    public function store(StoreMeetingRequest $request){
        $data = $request->validationData();
        $meeting = new Meeting($data);
        $meeting->save();
        return new MeetingResource($meeting->load('participants'));
    }

}
