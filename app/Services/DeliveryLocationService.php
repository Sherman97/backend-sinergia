<?php
namespace App\Services;

use App\Models\DeliveryLocation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DeliveryLocationService
{
   public function getAll(array $query = []): LengthAwarePaginator|Collection
    {
        $builder = DeliveryLocation::query()
            ->with(['geoScope', 'transportType'])
            ->orderBy('id');

        if (!empty($query['paginate'])) {
            $perPage = isset($query['per_page']) ? (int) $query['per_page'] : 15;
            return $builder->paginate($perPage);
        }

        return $builder->get();
    }

    public function create(array $data): DeliveryLocation
    {
        return DeliveryLocation::create($data);
    }

    public function find(int $id): DeliveryLocation
    {
        return DeliveryLocation::findOrFail($id);
    }

    public function update(int $id, array $data): DeliveryLocation
    {
        $model = DeliveryLocation::findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): void
    {
        DeliveryLocation::findOrFail($id)->delete();
    }
}
