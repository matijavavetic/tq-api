<?php

namespace src\Applications\Http\FormRequests\Film;

use Illuminate\Foundation\Http\FormRequest;

class CharacterFilmListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'characterName' => [
                'required',
                'string'
            ],
        ];
    }

    public function validationData(): array
    {
        $input = [
            'characterName' => $this->input('characterName')
        ];

        return $input;
    }
}