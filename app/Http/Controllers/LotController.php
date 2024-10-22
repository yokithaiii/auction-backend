<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lot\LotStoreRequest;
use App\Http\Requests\Lot\LotUpdateRequest;
use App\Services\LotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function __construct(private readonly LotService $lotService)
    {}

    public function index(Request $request): JsonResponse
    {
        return $this->lotService->getAllLots($request);
    }

    public function store(LotStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        return $this->lotService->createLot($validatedData);
    }

    public function update(LotUpdateRequest $request, String $id): JsonResponse
    {
        $validatedData = $request->validated();
        return $this->lotService->updateLot($id, $validatedData);
    }

    public function destroy(String $id): JsonResponse
    {
        return $this->lotService->deleteLot($id);
    }
}
