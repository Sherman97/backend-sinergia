<?php
namespace App\Services;

use App\Models\Delivery;
use App\Models\TransportType;
use Illuminate\Pagination\LengthAwarePaginator;

class DeliveryService
{
    public function getAll(array $filters = []): LengthAwarePaginator
    {
        return Delivery::with(['client','product','deliveryLocation','transportType'])
                       ->paginate(15);
    }

    public function create(array $data): Delivery
    {
        $transport = TransportType::findOrFail($data['transport_type_id']);
        $discount = $transport->discount_base_rate;
        $data['discount_percent'] = $discount;
        $data['final_price'] = $data['quantity'] * $data['unit_price'] * (1 - $discount/100);

        return Delivery::create($data);
    }

    public function find(int $id): Delivery
    {
        return Delivery::with(['client','product','deliveryLocation','transportType'])->findOrFail($id);
    }

    public function update(int $id, array $data): Delivery
    {
        $delivery = Delivery::findOrFail($id);

        if (isset($data['transport_type_id'], $data['quantity'], $data['unit_price'])) {
            $transport = TransportType::findOrFail($data['transport_type_id']);
            $discount = $transport->discount_base_rate;
            $data['discount_percent'] = $discount;
            $data['final_price'] = $data['quantity'] * $data['unit_price'] * (1 - $discount/100);
        }

        $delivery->update($data);
        return $delivery;
    }

    public function delete(int $id): void
    {
        Delivery::findOrFail($id)->delete();
    }
}
