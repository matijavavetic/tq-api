<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Applications\Http\FormRequests\Film\CharacterFilmListRequest;
use src\Applications\Http\Factories\Film\CharacterFilmListRequestMapperFactory;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\FilmService;

class FilmController extends Controller
{
    public function characterFilmList(CharacterFilmListRequest $request, FilmService $filmService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = CharacterFilmListRequestMapperFactory::make($data);

        $responseMapper = $filmService->characterFilmList($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}