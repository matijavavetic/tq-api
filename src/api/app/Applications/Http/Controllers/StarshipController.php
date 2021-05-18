<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Applications\Http\FormRequests\Starship\StarshipListRequest;
use src\Applications\Factories\Starship\StarshipListRequestMapperFactory;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\StarshipService;

class StarshipController extends Controller
{
    public function list(StarshipListRequest $request, StarshipService $starshipService): JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = StarshipListRequestMapperFactory::make($data);

        $responseMapper = $starshipService->list($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}