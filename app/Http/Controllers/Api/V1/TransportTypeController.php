<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\TransportTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransportTypeController extends Controller
{
    public function __construct(private TransportTypeService $service) {}

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
