<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/', [TareaController::class, 'index'])->name('tareas.index');

Route::get('/Vista_nueva_tarea', [TareaController::class, 'vista_NuevaTarea'])->name('tareas.vista_nuevaTarea');

Route::get('/nueva_tarea', [TareaController::class, 'store'])->name('tareas.NuevaTarea');

Route::put('/actualizar_tarea/{id}', [TareaController::class, 'vista_EditarTarea'])->name('tarea.vista_editar');

Route::put('/tarea_actualizar/{id}', [TareaController::class, 'update'])->name('tarea.editar');

Route::delete('/eliminar_tarea/{id}', [TareaController::class, 'destroy'])->name('tarea.eliminar');





