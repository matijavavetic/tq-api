<?php

namespace src\Applications\Http\FormRequests\Planet;

use Illuminate\Foundation\Http\FormRequest;

class PlanetListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'createdAfter' => [
                'nullable',
                'date'
            ],
        ];
    }

    public function validationData(): array
    {
        $input = [
            'createdAfter' => $this->input('createdAfter') ? $this->input('createdAfter') : '2014-04-12'
        ];

        return $input;
    }
}