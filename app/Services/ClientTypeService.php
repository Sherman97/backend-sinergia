<?php

namespace App\Services;

use App\Models\ClientType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ClientTypeService
{
    /**
     * Lista geo_scopes. Si viene ?paginate=1 devuelve paginado, si no, todo.
     */
    public function getAll(array $query = []): LengthAwarePaginator|Collection
    {
        $builder = ClientType::query()->orderBy('id');

        if (!empty($query['paginate'])) {
            $perPage = isset($query['per_page']) ? (int) $query['per_page'] : 15;
            return $builder->paginate($perPage);
        }

        return $builder->get();
    }

    /**
     * Obtiene un geo_scope por ID.
     */
    public function find(int $id): ClientType
    {
        return ClientType::findOrFail($id);
    }
}
