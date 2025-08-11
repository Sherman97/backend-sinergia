<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryLocationRequest;
use App\Http\Requests\UpdateDeliveryLocationRequest;
use App\Services\DeliveryLocationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DeliveryLocationController extends Controller
{
    public function __construct(private DeliveryLocationService $service) {}

    public function index(Request $request): JsonResponse
    {
        $locations = $this->service->getAll($request->query());
        return response()->json($locations);
    }

    public function store(StoreDeliveryLocationRequest $request): JsonResponse
    {
        $loc = $this->service->create($request->validated());
        return response()->json($loc, 201);
    }

    public function show(int $id): JsonResponse
    {
        $loc = $this->service->find($id);
        return response()->json($loc);
    }

    public function update(UpdateDeliveryLocationRequest $request, int $id): JsonResponse
    {
        $loc = $this->service->update($id, $request->validated());
        return response()->json($loc);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
