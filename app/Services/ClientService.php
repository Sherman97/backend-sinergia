<?php
namespace App\Services;

use App\Models\Client;           // o Product, DeliveryLocation
use Illuminate\Pagination\LengthAwarePaginator;

class ClientService
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        return Client::paginate(15);
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }

    public function find(int $id): Client
    {
        return Client::findOrFail($id);
    }

    public function update(int $id, array $data): Client
    {
        $model = Client::findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): void
    {
        Client::findOrFail($id)->delete();
    }
}
