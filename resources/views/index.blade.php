
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    <h1>Bienvenido a la aplicación de gestión de tareas</h1>
    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('tareas.vista_nuevaTarea') }}" methods="GET">
        <button>Agregar nueva tarea</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha Limite</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
            <tr>
                <td>{{ $tarea->id}}</td>
                <td>{{ $tarea->titulo}}</td>
                <td>{{ $tarea->descripcion }}</td>
                <td>{{ $tarea->fecha_limite }}</td>
                <td>{{ $tarea->prioridad }}</td>
                <td>
                    @if ($tarea->completada == 0)
                        <p>Pediente</p>
                    @else
                        <p>Completada</p>
                    @endif
                </td>
                <td>
                    <form action="{{ route('tarea.vista_editar', $tarea->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('tarea.eliminar', $tarea->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar la tarea {{ $tarea->id }}?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>