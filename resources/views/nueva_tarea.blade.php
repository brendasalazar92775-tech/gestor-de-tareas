<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container py-4 px-5 mx-auto">
    <h2>Agregar Nueva Tarea</h2>
    <br>

    <form class="card p-3" action="{{ route('tareas.NuevaTarea') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Nueva Tarea</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingresa el titulo de la tarea" aria-describedby="titulo">
            @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" type="text" name="descripcion" placeholder="Ingresa la descripcion de la tarea"  aria-describedby="titulo"></textarea>
            @error('descripcion')
            <div class="text-danger">{{ $message }}</div>
        @enderror 
        </div>
          


        <div class="mb-3">
            <label for="fecha_limite" class="form-label">Fecha Limite</label>
            <input type="date" class="form-control" name="fecha_limite" placeholder="Ingresa la fecha límite">
            @error('fecha_limite')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        
        
        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
            <select class="select form-select" name="prioridad" id="prioridad">
                <option value="">Selecciona una prioridad</option>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
        @error('prioridad')
            <div class="text-danger">{{ $message }}</div>
        @enderror 
        </div>
    
        <button class="btn btn-primary" type="submit">Enviar</button>

    </form>
</body>
</html>