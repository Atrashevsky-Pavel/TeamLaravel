<?php

namespace App\Http\Requests;

class TeamFilterRequestPages extends TeamFilterRequest
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
        $arr = $this->rulesArr;
        $arr['start'] = 'numeric|min:0';
        $arr['finish'] = 'numeric|min:0';
        return $arr;
    }
}
