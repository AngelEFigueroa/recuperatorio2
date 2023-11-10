@extends('adminlte::page')

@section('title', 'Productos')

{{-- Activamos el Plugin de Datatables instalado en AdminLTE --}}
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.10/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('producto.create') }}" class="btn btn-success text-uppercase">
                    Nuevo Producto
                </a>
            </div>

            @if (session('alert'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla-productos" class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-uppercase">Categoría</th>
                                    <th scope="col" class="text-uppercase">Nombre</th>
                                    <th scope="col" class="text-uppercase">Descripción</th>
                                    <th scope="col" class="text-uppercase">Imagen</th>
                                    <th scope="col" class="text-uppercase">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td></td>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->categoria->nombre }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ Str::limit($producto->descripcion, 80) }}</td>
                                        <td>
                                            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}"
                                                class="img-fluid" style="width: 150px;">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('producto.show', $producto) }}"
                                                    class="btn btn-sm btn-info text-white text-uppercase me-1">
                                                    Ver
                                                </a>
                                                <a href="{{ route('producto.edit', $producto) }}"
                                                    class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                                    Editar
                                                </a>
                                                <form action="{{ route('producto.destroy', $producto) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#tabla-productos').DataTable({
                responsive: true,
                autoWidth: false,
                searching: true,
                paging: true,
            });

            // Activar el modal después de que la tabla se haya inicializado
            $('#tabla-productos').on('click', '.btn-delete', function() {
                $('#deleteModal').modal('show');
            });
        });
    </script>

@endsection
