<?php

namespace App\Http\Requests\Meetings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMeetingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'            => 'required|string',
            'description'      => 'required|string',
            'start_date'       => 'required|date',
            'end_date'         => 'date',
            'participantIds.*' => 'exists:participants,id'
        ];
    }

    public function meetingData()
    {
        $base = [
            'title'       => $this->title,
            'description' => $this->description,
            'start_date'  => $this->start_date,

        ];
        if ($this->end_date) {
            $base['end_date'] =  $this->end_date;
        }

        return $base;

    }

    public function participants()
    {
      return $this->participants;
    }


}
