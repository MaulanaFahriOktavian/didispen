<?php

namespace App\Services;

use App\Repositories\Contracts\DispensationRepositoryInterface;
use Illuminate\Support\Str;
use App\Models\Dispensation;

class DispensationService
{
    public function __construct(
        protected DispensationRepositoryInterface $repository
    ) {}

    public function create(array $data): Dispensation
    {
        $data['code'] = DispensationCodeService::generate();

        $data['uuid'] = Str::uuid();

        $data['status'] = 'pending';

        return $this->repository->create($data);
    }
}