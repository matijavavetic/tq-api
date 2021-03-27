<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Applications\Http\FormRequests\Planet\PlanetListRequest;
use src\Applications\Factories\Planet\PlanetListRequestMapperFactory;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\PlanetService;

class PlanetController extends Controller
{
    public function list(PlanetListRequest $request, PlanetService $planetService): JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PlanetListRequestMapperFactory::make($data);

        $responseMapper = $planetService->list($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}