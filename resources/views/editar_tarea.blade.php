<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tarea</title>
    @vite(['resources/css/app.css'])
</head>
<body class="container py-4 px-5 mx-auto">
    <h1>Editar Tarea</h1>
        <form class="card p-3" action="{{ route('tarea.editar', $tarea->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Nueva Tarea</label>
            <input type="text" value="{{ $tarea->titulo }}" class="form-control" name="titulo" placeholder="Ingresa el titulo de la tarea" aria-describedby="titulo" required>
        
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea required class="form-control" type="text" name="descripcion" placeholder="Ingresa la descripcion de la tarea"  
                aria-describedby="titulo">{{ $tarea->descripcion }}</textarea>
        </div>
          


        <div class="mb-3">
            <label for="fecha_limite" class="form-label">Fecha Limite</label>
            <input type="date" class="form-control" name="fecha_limite" required placeholder="Ingresa la fecha límite" value="{{ $tarea->fecha_limite }}">
            
        </div>
        
        
        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
            <select class="select form-select" name="prioridad" id="prioridad" required>
                <option value="">Selecciona una prioridad</option>
                <option {{ $tarea->prioridad == 'Alta' ? 'selected' : '' }} value="Alta">Alta</option>
                <option {{ $tarea->prioridad == 'Media' ? 'selected' : '' }} value="Media">Media</option>
                <option {{ $tarea->prioridad == 'Baja' ? 'selected' : '' }} value="Baja">Baja</option>
            </select>
        
        </div>
    
        <button class="btn btn-primary" type="submit">Enviar</button>

    </form>
</body>
</html>