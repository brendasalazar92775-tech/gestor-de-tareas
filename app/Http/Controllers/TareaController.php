<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Http\Requests\ListaPostRequest;

class TareaController extends Controller
{

    public function index()
    {
        $tareas = Tarea::all();
        return view('index', compact('tareas'));
    }

    public function vista_NuevaTarea()
    {
        return view('nueva_tarea');
    }

    public function vista_EditarTarea(string $id)
    {
        if ($id) {
            $tarea = Tarea::findOrFail($id);
            return view('editar_tarea', compact('tarea'));
        } else {
            $inicio = $this->index();
            return $inicio;
        }
    }

    public function store(ListaPostRequest $request)
    {
        $validacion = $request->validated();

        Tarea::create($validacion);

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListaPostRequest $request, string $id)
    {
        $tarea = Tarea::findOrFail($id);
        $validacion = $request->validated();
        $tarea->update($validacion);

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarea = Tarea::findOrFail($id);

        if ($tarea->prioridad === 'Alta') {
            return redirect()->route('tareas.index')->with('error', 'No se puede eliminar una tarea con prioridad Alta.');

        }
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
