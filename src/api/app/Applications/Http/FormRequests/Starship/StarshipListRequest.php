<?php

namespace src\Applications\Http\FormRequests\Starship;

use Illuminate\Foundation\Http\FormRequest;

class StarshipListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'passengers' => [
                'nullable',
                'integer'
            ],
        ];
    }

    public function validationData(): array
    {
        $input = [
            'passengers' => $this->input('passengers') ? $this->input('passengers') : 84000
        ];

        return $input;
    }
}