<?php
// app/Http/Controllers/Api/TaskController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    // Endpoint público: Listar todas las tareas con id y nombre
    public function index()
    {
        $tasks = Task::all(['id', 'name']);
        return response()->json($tasks);
    }

    // Endpoint privado: Obtener las tareas de un usuario específico
    public function userTasks()
    {
        $user = Auth::user();
        if ($user) {
            $tasks = $user->tasks()->get(['id', 'name']);
            return response()->json($tasks);
        } else {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    }

    // Endpoint privado: Actualizar una tarea
    public function update(Request $request, Task $task)
    {
        if (Gate::denies('update-task', $task)) {
            return response()->json(['error' => 'No tienes permiso para actualizar esta tarea.'], 403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $task->update($request->only('name'));

        return response()->json($task);
    }

    // Endpoint privado: Eliminar una tarea
    public function destroy(Task $task)
    {
        if (Gate::denies('delete-task', $task)) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta tarea.'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Tarea eliminada con éxito.']);
    }
}
