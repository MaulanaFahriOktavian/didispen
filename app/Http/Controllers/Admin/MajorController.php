<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseCrudController;
use App\Models\Major;
use App\Http\Requests\Admin\StoreMajorRequest;
use App\Http\Requests\Admin\UpdateMajorRequest;
use App\Actions\Major\CreateAction;
use App\Actions\Major\UpdateAction;
use App\Actions\Major\DeleteAction;
use Illuminate\Http\Request;

class MajorController extends BaseCrudController
{
    public function __construct(
        protected CreateAction $createAction,
        protected UpdateAction $updateAction,
        protected DeleteAction $deleteAction
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Major::class);
        $query = Major::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('code', 'like', "%{$request->search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->boolean('trashed')) {
            $query->onlyTrashed();
        }

        $majors = $query->latest()->paginate(10)->withQueryString();
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        $this->authorize('create', Major::class);
        return view('admin.majors.create');
    }

    public function store(StoreMajorRequest $request)
    {
        $this->authorize('create', Major::class);
        $this->createAction->execute($request->validated());
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Major $major)
    {
        $this->authorize('update', $major);
        return view('admin.majors.edit', compact('major'));
    }

    public function update(UpdateMajorRequest $request, Major $major)
    {
        $this->authorize('update', $major);
        $this->updateAction->execute($major, $request->validated());
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Major $major)
    {
        $this->authorize('delete', $major);
        $this->deleteAction->destroy($major);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus.');
    }

    public function restore($id)
    {
        $major = Major::withTrashed()->findOrFail($id);
        $this->authorize('restore', $major);
        $this->deleteAction->restore($id);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dipulihkan.');
    }

    public function bulkDestroy(Request $request)
    {
        $this->authorize('delete', Major::class);
        $request->validate(['ids' => 'required|array', 'ids.*' => 'exists:majors,id']);
        $this->deleteAction->bulkDestroy($request->ids);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan terpilih berhasil dihapus.');
    }

    public function bulkRestore(Request $request)
    {
        $this->authorize('restore', Major::class);
        $request->validate(['ids' => 'required|array', 'ids.*' => 'exists:majors,id']);
        $this->deleteAction->bulkRestore($request->ids);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan terpilih berhasil dipulihkan.');
    }
}