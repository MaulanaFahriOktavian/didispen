<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseCrudController;
use App\Models\Classroom;
use App\Models\Major;
use App\Http\Requests\Admin\StoreClassroomRequest;
use App\Http\Requests\Admin\UpdateClassroomRequest;
use App\Actions\Classroom\CreateAction;
use App\Actions\Classroom\UpdateAction;
use App\Actions\Classroom\DeleteAction;
use Illuminate\Http\Request;

class ClassroomController extends BaseCrudController
{
    public function __construct(
        protected CreateAction $createAction,
        protected UpdateAction $updateAction,
        protected DeleteAction $deleteAction
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Classroom::class);
        $query = Classroom::with('major');

        // Search berdasarkan Nama Kelas Lengkap
        if ($request->filled('search')) {
            $query->where('full_name', 'like', "%{$request->search}%");
        }

        // Filter Jurusan
        if ($request->filled('major_id')) {
            $query->where('major_id', $request->major_id);
        }

        // Filter Tingkat
        if ($request->filled('grade')) {
            $query->where('grade', $request->grade);
        }

        // Soft Delete Handling
        if ($request->boolean('trashed')) {
            $query->onlyTrashed();
        }

        $classrooms = $query->latest()->paginate(15)->withQueryString();
        $majors = Major::where('status', 'active')->orderBy('name')->get();
        
        return view('admin.classrooms.index', compact('classrooms', 'majors'));
    }

    public function create()
    {
        $this->authorize('create', Classroom::class);
        $majors = Major::where('status', 'active')->orderBy('name')->get();
        return view('admin.classrooms.create', compact('majors'));
    }

    public function store(StoreClassroomRequest $request)
    {
        $this->authorize('create', Classroom::class);
        $this->createAction->execute($request->validated());
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Classroom $classroom)
    {
        $this->authorize('update', $classroom);
        $majors = Major::where('status', 'active')->orderBy('name')->get();
        return view('admin.classrooms.edit', compact('classroom', 'majors'));
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $this->authorize('update', $classroom);
        $this->updateAction->execute($classroom, $request->validated());
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Classroom $classroom)
    {
        $this->authorize('delete', $classroom);
        $this->deleteAction->destroy($classroom);
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function restore($id)
    {
        $classroom = Classroom::withTrashed()->findOrFail($id);
        $this->authorize('restore', $classroom);
        $this->deleteAction->restore($id);
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas berhasil dipulihkan.');
    }

    public function bulkDestroy(Request $request)
    {
        $this->authorize('delete', Classroom::class);
        $request->validate(['ids' => 'required|array', 'ids.*' => 'exists:classrooms,id']);
        $this->deleteAction->bulkDestroy($request->ids);
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas terpilih berhasil dihapus.');
    }

    public function bulkRestore(Request $request)
    {
        $this->authorize('restore', Classroom::class);
        $request->validate(['ids' => 'required|array', 'ids.*' => 'exists:classrooms,id']);
        $this->deleteAction->bulkRestore($request->ids);
        return redirect()->route('admin.classrooms.index')->with('success', 'Kelas terpilih berhasil dipulihkan.');
    }
}