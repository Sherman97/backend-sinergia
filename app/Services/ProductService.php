<?php
namespace App\Services;

use App\Models\Product;           // o Product, DeliveryLocation
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        return Product::paginate(15);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function find(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function update(int $id, array $data): Product
    {
        $model = Product::findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): void
    {
        Product::findOrFail($id)->delete();
    }
}
