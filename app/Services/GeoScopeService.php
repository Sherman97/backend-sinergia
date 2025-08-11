<?php

namespace App\Services;

use App\Models\GeoScope;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GeoScopeService
{
    /**
     * Lista geo_scopes. Si viene ?paginate=1 devuelve paginado, si no, todo.
     */
    public function getAll(array $query = []): LengthAwarePaginator|Collection
    {
        $builder = GeoScope::query()->orderBy('id');

        if (!empty($query['paginate'])) {
            $perPage = isset($query['per_page']) ? (int) $query['per_page'] : 15;
            return $builder->paginate($perPage);
        }

        return $builder->get();
    }

    /**
     * Obtiene un geo_scope por ID.
     */
    public function find(int $id): GeoScope
    {
        return GeoScope::findOrFail($id);
    }
}
