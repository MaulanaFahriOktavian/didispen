<?php

namespace App\Repositories\Contracts;

use App\Models\Dispensation;

interface DispensationRepositoryInterface
{
    public function create(array $data): Dispensation;

    public function findByUuid(string $uuid): ?Dispensation;

    public function update(Dispensation $dispensation,array $data): bool;
}