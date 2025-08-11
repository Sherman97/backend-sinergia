<?php

namespace App\Services;

use App\Models\ProductType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductTypeService
{
    public function getAll(array $query = []): LengthAwarePaginator|Collection
    {
        $builder = ProductType::query()->orderBy('id');

        if (!empty($query['paginate'])) {
            $perPage = isset($query['per_page']) ? (int) $query['per_page'] : 15;
            return $builder->paginate($perPage);
        }

        return $builder->get();
    }

    public function find(int $id): ProductType
    {
        return ProductType::findOrFail($id);
    }
}
