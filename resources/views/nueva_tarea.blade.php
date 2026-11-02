<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <h2>Agregar Nueva Tarea</h2>
    <form action="{{ route('tareas.NuevaTarea') }}">
        @csrf
        <label for="titulo">Nueva Tarea</label>
        <input type="text" name="titulo" placeholder="Ingresa el titulo de la tarea">
        @error('titulo')
            <div>{{ $message }}</div>
        @enderror
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" placeholder="Ingresa la descripcion de la tarea">
        @error('descripcion')
            <div>{{ $message }}</div>
        @enderror   
        <label for="fecha_limite">Fecha Limite</label>
        <input type="date" name="fecha_limite" placeholder="Ingresa la fecha límite">
        @error('fecha_limite')
            <div>{{ $message }}</div>
        @enderror 
        <label for="prioridad">Prioridad</label>
        <select name="prioridad" id="prioridad">
            <option value="">Selecciona una prioridad</option>
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select>
         @error('prioridad')
            <div>{{ $message }}</div>
        @enderror 
        <button type="submit">Enviar</button>

    </form>
</body>
</html>