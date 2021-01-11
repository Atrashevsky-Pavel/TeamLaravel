<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $rulesArr = [
        'searchName' => 'sometimes|nullable|alpha',
        'sortName' => 'sometimes|nullable|alpha',
        'sortAgeStart' => 'sometimes|nullable|numeric|min:12',
        'sortAgeEnd' => 'sometimes|nullable|numeric|max:74',
    ];

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
        return $this->rulesArr;
    }
}
