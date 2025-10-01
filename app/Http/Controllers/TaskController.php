<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', Rule::unique('tasks', 'title')],
        ], [
            'title.required' => 'Judul tugas wajib diisi.',
            'title.unique'   => 'Judul tugas ini sudah ada, silakan gunakan judul lain.',
        ]);

        Task::create([
            'title'   => $validated['title'],
            'is_done' => false,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'title' => [
                'required',
                Rule::unique('tasks', 'title')->ignore($task->id),
            ],
        ], [
            'title.required' => 'Judul tugas wajib diisi.',
            'title.unique'   => 'Judul tugas ini sudah ada, silakan gunakan judul lain.',
        ]);

        $task->update([
            'title'   => $validated['title'],
            'is_done' => $request->boolean('is_done'),
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tugas berhasil dihapus!');
    }

    public function toggle(Task $task): RedirectResponse
    {
        $task->update([
            'is_done' => !$task->is_done,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Status tugas diperbarui!');
    }
}
