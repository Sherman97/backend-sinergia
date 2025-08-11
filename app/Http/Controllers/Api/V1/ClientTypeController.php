<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ClientTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
    public function __construct(private ClientTypeService $service) {}

    public function index(Request $request): JsonResponse
    {
        $data = $this->service->getAll($request->query());
        return response()->json($data);
    }

    public function show(int $id): JsonResponse
    {
        $item = $this->service->find($id);
        return response()->json($item);
    }
}
