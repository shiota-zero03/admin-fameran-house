<?php

namespace App\Process\Repositories;

use App\Models\WebOrder;

class WebOrderRepository
{
    public function showDataDesc()
    {
        return WebOrder::orderByDesc('id')->get();
    }
    public function getById($id)
    {
        return WebOrder::find($id);
    }
    public function createData($data)
    {
        return WebOrder::create($data);
    }
    public function updateData($data, $id)
    {
        return WebOrder::find($id)->update($data);
    }
}
