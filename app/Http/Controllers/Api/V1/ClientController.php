<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(private ClientService $service) {}

    public function index(Request $request): JsonResponse
    {
        $clients = $this->service->getAll($request->query());
        return response()->json($clients);
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = $this->service->create($request->validated());
        return response()->json($client, 201);
    }

    public function show(int $id): JsonResponse
    {
        $client = $this->service->find($id);
        return response()->json($client);
    }

    public function update(UpdateClientRequest $request, int $id): JsonResponse
    {
        $client = $this->service->update($id, $request->validated());
        return response()->json($client);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
