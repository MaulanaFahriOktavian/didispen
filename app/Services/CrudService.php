<?php

namespace App\Services\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CrudService
{
    public function buildQuery(
        string $modelClass,
        ?string $search = null,
        array $searchableColumns = [],
        array $filters = [],
        ?string $sortBy = null,
        string $sortDirection = 'desc',
        array $withRelations = [],
        bool $includeTrashed = false
    ): Builder {
        $query = $modelClass::query();

        if (!empty($withRelations)) $query->with($withRelations);
        if ($includeTrashed) $query->withTrashed();

        if ($search && !empty($searchableColumns)) {
            $query->where(function (Builder $q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $q->$method($column, 'like', "%{$search}%");
                }
            });
        }

        foreach ($filters as $column => $value) {
            if ($value !== null && $value !== '') {
                $query->where($column, $value);
            }
        }

        if ($sortBy) $query->orderBy($sortBy, $sortDirection);

        return $query;
    }

    public function paginate(Builder $query, int $perPage = 10): LengthAwarePaginator
    {
        return $query->paginate($perPage)->withQueryString();
    }

    public function create(string $modelClass, array $data): Model
    {
        return DB::transaction(fn() => $modelClass::create($data));
    }

    public function update(Model $item, array $data): Model
    {
        return DB::transaction(function () use ($item, $data) {
            $item->update($data);
            return $item->fresh();
        });
    }

    public function softDelete(Model $item): bool { return $item->delete(); }
    public function restore(Model $item): bool { return $item->restore(); }
    public function forceDelete(Model $item): bool { return $item->forceDelete(); }

    public function bulkDelete(string $modelClass, array $ids): int
    {
        return DB::transaction(fn() => $modelClass::whereIn('id', $ids)->delete());
    }

    public function bulkRestore(string $modelClass, array $ids): int
    {
        return DB::transaction(fn() => $modelClass::withTrashed()->whereIn('id', $ids)->restore());
    }

    public function findOrFail(string $modelClass, $id): Model
    {
        return $modelClass::findOrFail($id);
    }

    public function findWithTrashed(string $modelClass, $id): Model
    {
        return $modelClass::withTrashed()->findOrFail($id);
    }

    public function getStats(string $modelClass): array
    {
        $model = new $modelClass;
        $table = $model->getTable();
        $schema = $model->getConnection()->getSchemaBuilder();
        $hasIsActive = $schema->hasColumn($table, 'is_active');
        $hasSoftDeletes = in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive($modelClass));

        return [
            'total' => $modelClass::count(),
            'active' => $hasIsActive ? $modelClass::where('is_active', true)->count() : 0,
            'inactive' => $hasIsActive ? $modelClass::where('is_active', false)->count() : 0,
            'trashed' => $hasSoftDeletes ? $modelClass::onlyTrashed()->count() : 0,
        ];
    }
}