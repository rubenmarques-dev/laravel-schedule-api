<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meetings\StoreMeetingRequest;
use App\Http\Requests\Meetings\UpdateMeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{

    public function index(){
        $meetings = Meeting::with('participants')->get();
        return MeetingResource::collection($meetings);
    }

    public function show($meetingId){
        $meeting = Meeting::whereId($meetingId)->with('participants')->first();
        return new MeetingResource($meeting);
    }

    public function store(StoreMeetingRequest $request){
        $data = $request->meetingData();
        $meeting = new Meeting($data);
        $meeting->save();
        $participants= $request->participants();
        if(count($participants)){
            $meeting->participants()->attach($participants);
        }
        return new MeetingResource($meeting->load('participants'));
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting){
        $data = $request->meetingData();
        $meeting->update($data);
        $participants= $request->participants();
        $meeting->participants()->sync($participants);
        $meeting->refresh();
        return new MeetingResource($meeting->load('participants'));
    }

}
