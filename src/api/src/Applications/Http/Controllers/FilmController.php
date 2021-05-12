<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use src\Applications\Http\FormRequests\Film\CharacterFilmListRequest;
use src\Applications\Factories\Film\CharacterFilmListRequestMapperFactory;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\FilmService;

class FilmController extends Controller
{
    public function characterFilmList(CharacterFilmListRequest $request, FilmService $filmService): JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = CharacterFilmListRequestMapperFactory::make($data);

        Cache::set('ayde', 'ayde');

        dd(Cache::store('memcached')->get('ayde'));

        $responseMapper = $filmService->characterFilmList($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}