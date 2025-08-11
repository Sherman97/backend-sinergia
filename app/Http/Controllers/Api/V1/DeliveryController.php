<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Services\DeliveryService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeliveryController extends Controller
{
    private DeliveryService $service;

    public function __construct(DeliveryService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): JsonResponse
    {
        // Delegamos paginación y carga de relaciones al service
        $deliveries = $this->service->getAll($request->query());
        return response()->json($deliveries);
    }

    public function store(StoreDeliveryRequest $request): JsonResponse
    {
        // Valida y delega la creación al service
        $delivery = $this->service->create($request->validated());
        return response()->json($delivery, 201);
    }

    public function show(int $id): JsonResponse
    {
        $delivery = $this->service->find($id);
        return response()->json($delivery);
    }

    public function update(UpdateDeliveryRequest $request, int $id): JsonResponse
    {
        $delivery = $this->service->update($id, $request->validated());
        return response()->json($delivery);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
