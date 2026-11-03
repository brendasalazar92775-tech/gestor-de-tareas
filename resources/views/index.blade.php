
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
    <div>
        <!-- Titulo y boton de agregar nueva tarea -->
        <div class="row align-items-center justify-content-between mb-3">
            <div class="title uppercase col-5">
                <h2>Gestor de Tareas</h2>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <form action="{{ route('tareas.vista_nuevaTarea') }}" methods="GET">
                    <button class="btn btn-primary">+ Nueva Tarea</button>
                </form>
            </div>
        </div>

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


        <!-- Resumen de Tareas -->

        <div class="row mb-3">
            <div class="col-4">
                <div class="card-body card">
                    <h3 class="card-subtitle mb-2">{{$total}}</h3>
                    <h6 class="card-title text-muted">Total de tareas</h6>

                </div>
                
            </div>
            <div class="col-4">
                <div class="card-body card">
                    <h3 class="card-subtitle mb-2 text-danger">{{$total_pendiente}}</h3>
                    <h6 class="card-title text-muted">Pendientes</h6>

                </div>
            </div>
            <div class="col-4">
                <div class="card-body card">
                    <h3 class="card-subtitle mb-2 text-success">{{ $total_completada }}</h3>
                    <h6 class="card-title text-muted">Completadas</h6>

                </div>
            </div>
        </div>

        <!-- Subtitulo - Tareas Pendientes -->
        <div>
            <p class="h4">Tareas Pendientes</p>
        </div>

        <!-- Card de tarea -->
        @foreach ($tareas as $tarea)
            @if ($tarea->completada == 0)
                <div class="card mt-3">
                <div class="row p-2" >
                    <div class="d-flex align-items-center justify-content-center col-1">
                        
                        <input class="form-check-input p-0" type="checkbox" onchange="completarTarea({{ $tarea->id }}, this.checked)" 
                            {{ $tarea->completada ? 'checked' : '' }}>
                    </div>
                    <div class="d-flex col-9 justify-content-center flex-column">
                        
                        <p class="h5">{{$tarea->titulo}}</p>
                        <p class="fs-6">{{ $tarea->descripcion }}</p>
                        <p>Prioridad: {{ $tarea->prioridad }}</p>
                    </div>
                    <div class="d-flex col-2 align-items-end justify-content-end">
                        <div>
                            <div class="d-flex flex-column align-items-end justify-content-end mb-0 p-0">
                                <p class="h6">{{'ID: '.$tarea->id}}</p>
                                <p class="text-muted fs-7">Limite: {{ $tarea->fecha_limite }}</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('tarea.vista_editar', $tarea->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-warning" type="submit"><img class="img-fluid w-5" src="{{ asset('/images/editar.png') }}" alt="Editar"></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('tarea.eliminar', $tarea->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la tarea {{ $tarea->id }}?')"><img class="img-fluid w-5" src="{{ asset('/images/eliminar.png') }}" alt="Eliminar"></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>  
            </div>
            @endif
        @endforeach
        <br>
        <div class="mb-3">
            <p class="h4 mb-3">Tareas Completadas</p>
        </div>
        @foreach ($tareas as $tarea)
            @if ($tarea->completada == 1)
                <div class="card mt-3">
                <div class="row p-2" >
                    <div class="d-flex align-items-center justify-content-center col-1">
                        <input class="form-check-input p-0" type="checkbox" onchange="completarTarea({{ $tarea->id }}, this.checked)" 
                            {{ $tarea->completada ? 'checked' : '' }}>
                    </div>
                    <div class="d-flex col-9 justify-content-center flex-column">
                        <p class="h5">{{ $tarea->titulo}}</p>
                        <p class="fs-6">{{ $tarea->descripcion }}</p>
                    </div>
                    <div class="d-flex col-2 align-items-end justify-content-end">
                        <div>
                            <div class="d-flex align-items-end justify-content-end mb-0 p-0">
                                <p class="text-muted fs-7">{{ $tarea->fecha_limite }}</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('tarea.vista_editar', $tarea->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-warning" type="submit"><img class="img-fluid w-5" src="{{ asset('/images/editar.png') }}" alt="Editar"></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="{{ route('tarea.eliminar', $tarea->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la tarea {{ $tarea->id }}?')"><img class="img-fluid w-5" src="{{ asset('/images/eliminar.png') }}" alt="Eliminar"></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>  
            </div>
            @endif
        @endforeach
        <div></div>
    </div>
</body>
</html>

<script>
    function completarTarea(id, completada) {
        fetch(`/completar_tarea/${id}/completar`,{
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
                    console.log('Error al actualizar la tarea', completada);
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

        window.location.reload();

    }
</script>