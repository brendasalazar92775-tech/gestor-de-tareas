<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form action="{{ route('tarea.editar', $tarea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titulo">Nueva Tarea</label>
        <input type="text" name="titulo" required value="{{ $tarea->titulo }}" placeholder="Ingresa el titulo de la tarea">
        <label for="titulo">Descripcion</label>
        <input type="text" name="descripcion" required value="{{ $tarea->descripcion }}" placeholder="Ingresa la descripcion de la tarea">
        <label for="fecha_limite">Fecha Limite</label>
        <input type="date" name="fecha_limite" required value="{{ $tarea->fecha_limite }}">
        <select name="prioridad" id="prioridad">
            <option {{ $tarea->prioridad == 'Alta' ? 'selected' : '' }} value="Alta">Alta</option>
            <option {{ $tarea->prioridad == 'Media' ? 'selected' : '' }} value="Media">Media</option>
            <option {{ $tarea->prioridad == 'Baja' ? 'selected' : '' }} value="Baja">Baja</option>
        </select>
        <button type="submit">Enviar</button>

    </form>
</body>
</html>