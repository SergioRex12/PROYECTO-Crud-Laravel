<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Crud Laravel</title>
</head>

<body>
    <h1 class="text-center">Crud Laravel</h1>
    <div class="w-75 m-auto">

    <!-- Notificación -->
    @if (!is_null(session("estado")))
        <div class='alert {{session("estado")[0] ? 'alert-success' : 'alert-danger' }}' role="alert">
            {{session("estado")[1]}}
        </div>
    @endif
        

    <!-- Modal crear usuario -->
    <div class="modal fade" id="modalCrearUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{route('crud.crear')}} method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="Crear-Name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Crear-Name" name="txtName">
                    </div>
                    <div class="mb-3">
                    <label for="Crear-Password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="Crear-Password" name="txtPassword">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

        <button class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalCrearUser">Crear Usuario</button>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarUser{{$user->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route("crud.borrar", $user->id)}}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>

                    <!-- Modal editar usuario -->
                    <div class="modal fade" id="modalEditarUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action={{route('crud.editar')}} method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="Editar-Id" class="form-label">ID</label>
                                        
                                        <input type="text" class="form-control" id="Editar-Id" name="txtIdEdit" value={{$user->id}} readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Editar-Name" class="form-label">Nombre</label>
                                        
                                        <input type="text" class="form-control" id="Editar-Name" name="txtNameEdit" value={{$user->name}} required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Editar-Password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="Editar-Password" name="txtPasswordEdit" value={{$user->password}} required>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>