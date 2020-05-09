<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = [
            'event_name'        => 'required|max:50|unique:events,event_name',
            'event_description' => 'required|string|max:250',
        ];

        if($this->isMethod('put')) {
            $validation['event_name'] = 'required|max:50|unique:events,event_name,' . $this->route('event')->id;
        }

        return $validation;
    }
}
