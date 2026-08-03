<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\CrudService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Base CRUD Controller - Fully Generic
 * 
 * Child class HANYA konfigurasi + optional hook methods.
 * TIDAK perlu override store/update/destroy/restore/forceDelete.
 */
abstract class BaseCrudController extends Controller
{
    protected CrudService $service;

    // ==========================================
    // ABSTRACT - WAJIB di-override
    // ==========================================
    abstract protected function getModelClass(): string;
    abstract protected function getResourceName(): string;
    abstract protected function getPageTitle(): string;
    abstract protected function getSingularLabel(): string;
    abstract protected function getPluralLabel(): string;
    abstract protected function getSearchableColumns(): array;
    abstract protected function getStoreRules(): array;
    abstract protected function getUpdateRules($id = null): array;

    // ==========================================
    // OPTIONAL - Dengan default
    // ==========================================
    protected function getFilterableColumns(): array { return []; }
    protected function getSortableColumns(): array { return ['created_at']; }
    protected function getWithRelations(): array { return []; }
    protected function getPerPage(): int { return 10; }
    protected function getViewPrefix(): string { return 'admin.master'; }
    protected function getValidationMessages(): array { return []; }
    protected function getValidationAttributes(): array { return []; }

    public function __construct()
    {
        $this->service = new CrudService();
    }

    // ==========================================
    // CRUD METHODS - TIDAK perlu di-override
    // ==========================================

    public function index(Request $request): View
    {
        $modelClass = $this->getModelClass();
        
        $query = $this->service->buildQuery(
            modelClass: $modelClass,
            search: $request->get('search'),
            searchableColumns: $this->getSearchableColumns(),
            filters: $this->extractFilters($request),
            sortBy: $request->get('sort_by'),
            sortDirection: $request->get('sort_direction', 'desc'),
            withRelations: $this->getWithRelations(),
            includeTrashed: $request->boolean('trashed', false)
        );

        $data = $this->service->paginate($query, $this->getPerPage());
        $stats = $this->service->getStats($modelClass);

        return view("{$this->getViewPrefix()}.{$this->getResourceName()}.index", [
            'data' => $data,
            'stats' => $stats,
            'pageTitle' => $this->getPageTitle(),
            'singularLabel' => $this->getSingularLabel(),
            'pluralLabel' => $this->getPluralLabel(),
            'resourceName' => $this->getResourceName(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->getStoreRules(),
            $this->getValidationMessages(),
            $this->getValidationAttributes()
        );

        $this->beforeCreate($validated);

        $this->service->create($this->getModelClass(), $validated);

        $this->afterCreate($validated);

        return redirect()
            ->route("admin.{$this->getResourceName()}.index")
            ->with('success', "{$this->getSingularLabel()} has been created successfully.");
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $modelClass = $this->getModelClass();
        $item = $this->service->findOrFail($modelClass, $id);

        $validated = $request->validate(
            $this->getUpdateRules($id),
            $this->getValidationMessages(),
            $this->getValidationAttributes()
        );

        $this->beforeUpdate($item, $validated);

        $this->service->update($item, $validated);

        $this->afterUpdate($item, $validated);

        return redirect()
            ->route("admin.{$this->getResourceName()}.index")
            ->with('success', "{$this->getSingularLabel()} has been updated successfully.");
    }

    public function destroy($id): RedirectResponse
    {
        $modelClass = $this->getModelClass();
        $item = $this->service->findOrFail($modelClass, $id);

        $this->beforeDelete($item);

        $this->service->softDelete($item);

        $this->afterDelete($item);

        return redirect()
            ->route("admin.{$this->getResourceName()}.index")
            ->with('success', "{$this->getSingularLabel()} has been deleted.");
    }

    public function restore($id): RedirectResponse
    {
        $modelClass = $this->getModelClass();
        $item = $this->service->findWithTrashed($modelClass, $id);
        
        $this->service->restore($item);

        return redirect()
            ->back()
            ->with('success', "{$this->getSingularLabel()} has been restored.");
    }

    public function forceDelete($id): RedirectResponse
    {
        $modelClass = $this->getModelClass();
        $item = $this->service->findWithTrashed($modelClass, $id);
        
        $this->service->forceDelete($item);

        return redirect()
            ->back()
            ->with('success', "{$this->getSingularLabel()} has been permanently deleted.");
    }

    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'exists:' . (new $this->getModelClass)->getTable() . ',id',
        ]);

        $modelClass = $this->getModelClass();
        $count = $this->service->bulkDelete($modelClass, $request->ids);

        return redirect()
            ->back()
            ->with('success', "{$count} {$this->getPluralLabel()} have been deleted.");
    }

    public function bulkRestore(Request $request): RedirectResponse
    {
        $request->validate(['ids' => 'required|array|min:1']);

        $modelClass = $this->getModelClass();
        $count = $this->service->bulkRestore($modelClass, $request->ids);

        return redirect()
            ->back()
            ->with('success', "{$count} {$this->getPluralLabel()} have been restored.");
    }

    // ==========================================
    // HOOK METHODS - Override untuk business logic khusus
    // ==========================================
    
    protected function beforeCreate(array &$data): void {}
    protected function afterCreate(array $data): void {}
    protected function beforeUpdate($item, array &$data): void {}
    protected function afterUpdate($item, array $data): void {}
    protected function beforeDelete($item): void {}
    protected function afterDelete($item): void {}

    // ==========================================
    // HELPER
    // ==========================================

    protected function extractFilters(Request $request): array
    {
        $filters = [];
        foreach ($this->getFilterableColumns() as $column) {
            if ($request->filled($column)) {
                $filters[$column] = $request->get($column);
            }
        }
        return $filters;
    }
}