<div>
    <h1>Solicitudes</h1>
    <a href="/logout">
        <button class="btn btn-primary">Cerrar sesión</button>
    </a>
    <div class="form-group my-3">
        <input wire:model="search" class="form-control" name="search" placeholder="Buscar..." />
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>CP ORIGEN</th>
                <th>CP DESTINO</th>
                <th>PAQUETE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ships as $ship)
                <tr id="ship_{{ $ship->id }}">
                    <td>
                        <div>
                            <ul>
                                <li>{{ $ship->full_name }}</li>
                                <li>{{ $ship->email }}</li>
                                <li>{{ $ship->telephone }}</li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $ship->cp_origin }}</td>
                    <td>{{ $ship->cp_destiny }}</td>
                    <td>
                        <div>
                            <ul>
                                <li>{{ $ship->content }}</li>
                                <li>Largo: {{ $ship->large }}CM</li>
                                <li>Ancho: {{ $ship->width }}CM</li>
                                <li>Alto: {{ $ship->height }}CM</li>
                                <li>Peso: {{ $ship->weight }}KG</li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <button class="btn btn-danger" onclick="deleteShip({{ $ship->id }})">Eliminar</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$ships->links()}}
</div>
