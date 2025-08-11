<?php

namespace App\Services;

use App\Models\TransportType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TransportTypeService
{
    public function getAll(array $query = []): LengthAwarePaginator|Collection
    {
        $builder = TransportType::query()->orderBy('id');

        if (!empty($query['paginate'])) {
            $perPage = isset($query['per_page']) ? (int) $query['per_page'] : 15;
            return $builder->paginate($perPage);
        }

        return $builder->get();
    }

    public function find(int $id): TransportType
    {
        return TransportType::findOrFail($id);
    }
}
