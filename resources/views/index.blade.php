
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container py-4 px-3 mx-auto">
    
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
        <button class="btn btn-primary">Agregar nueva tarea</button>
    </form>
    <table>
        <thead>
            <tr>
                <th></th>
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
                <td>
                    <input type="checkbox" onchange="completarTarea({{ $tarea->id }}, this.checked)" 
                        {{ $tarea->completada ? 'checked' : '' }}>
                </td>
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
                        <button class="btn btn-warning" type="submit">Editar</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('tarea.eliminar', $tarea->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la tarea {{ $tarea->id }}?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<script>
    function completarTarea(id, completada) {
        fetch('/completar_tarea/{{ $tarea->id }}/completar',{
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body:JSON.stringify({
                completada: completada
            })
        })
            .then(response => {
                if(!response.ok) {
                    throw new Error('Error al actualizar la tarea');
                }
                return response.json();
            })
            .then(data => {
                console.log('Esdado actualizado Correctamente');
            })
            .catch(error => {
                console.error('Error al obtener las tareas:', error);
                alert('Error al actualizar la tarea');
            });
    }
</script>