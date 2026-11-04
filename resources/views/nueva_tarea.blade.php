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

    <form class="card p-3" action="{{ route('tareas.NuevaTarea') }}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Nueva Tarea</label>
            <input type="text" class="form-control" name="titulo" placeholder="Ingresa el titulo de la tarea" aria-describedby="titulo" value="{{ old('titulo') }}">
            @error('titulo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" type="text" name="descripcion" placeholder="Ingresa la descripcion de la tarea"  aria-describedby="titulo">{{ old('descripcion') }} </textarea>
            @error('descripcion')
            <div class="text-danger">{{ $message }}</div>
        @enderror 
        </div>
          


        <div class="mb-3">
            <label for="fecha_limite" class="form-label">Fecha Limite</label>
            <input type="date" class="form-control" name="fecha_limite" placeholder="Ingresa la fecha límite" value="{{ old('fecha_limite') }}">
            @error('fecha_limite')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        
        
        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
            <select class="select form-select" name="prioridad" id="prioridad">
                <option value="">Selecciona una prioridad</option>
                <option value="Alta" {{ old('prioridad') == 'Alta' ? 'selected' : '' }}>Alta</option>
                <option value="Media" {{ old('prioridad') == 'Media' ? 'selected' : '' }}>Media</option>
                <option value="Baja" {{ old('prioridad') == 'Baja' ? 'selected' : '' }}>Baja</option>
            </select>
        @error('prioridad')
            <div class="text-danger">{{ $message }}</div>
        @enderror 
        </div>
    
        <button class="btn btn-primary" type="submit">Enviar</button>

    </form>
</body>
</html>