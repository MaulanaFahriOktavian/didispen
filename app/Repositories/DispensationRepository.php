<?php

namespace App\Repositories;

use App\Models\Dispensation;
use App\Repositories\Contracts\DispensationRepositoryInterface;

class DispensationRepository implements DispensationRepositoryInterface
{
    public function create(array $data): Dispensation
    {
        return Dispensation::create($data);
    }

    public function findByUuid(string $uuid): ?Dispensation
    {
        return Dispensation::where('uuid',$uuid)->first();
    }

    public function update(Dispensation $dispensation,array $data): bool
    {
        return $dispensation->update($data);
    }
}