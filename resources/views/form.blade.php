@extends('layouts.public_layout')

@section('title', 'Genera tu envío | EYA')

@section('body')
    <h1>Solicitud envío de paquete</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            Hubo un error en su solicitud
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            Se creo correctamente la solicitud
        </div>
    @endif

    <form action="/create_ship" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="full_name">Nombre Completo</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Escribe tu nombre..."
                class="form-control" />
            @error('full_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Escribe tu correo..."
                class="form-control" />
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="telephone">Teléfono</label>
            <input type="tel" name="telephone" placeholder="Escribe tu telefono..." class="form-control" />
            @error('telephone')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="row form-group my-2">
            <div class="col-6">
                <label for="cp_origin">CP Origen</label>
                <input type="number" name="cp_origin" class="form-control" />
                @error('cp_origin')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-6">
                <label for="cp_destiny">CP Destino</label>
                <input type="number" name="cp_destiny" class="form-control" />
                @error('cp_destiny')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <hr />
        <center>
            <h4>Datos del paquete</h4>
        </center>
        <div class="row form-group my-2">
            <div class="col-6">
                <label for="large">Largo (CM)</label>
                <input type="number" name="large" class="form-control" />
                @error('large')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-6">
                <label for="width">Ancho (CM)</label>
                <input type="number" name="width" class="form-control" />
                @error('width')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row form-group my-2">
            <div class="col-6">
                <label for="height">Alto (CM)</label>
                <input type="number" name="height" class="form-control" />
                @error('height')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-6">
                <label for="weight">Peso (KG)</label>
                <input type="number" name="weight" class="form-control" />
                @error('weight')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="form-group my-2">
            <textarea class="form-control" name="content" cols="30" rows="5"></textarea>
            @error('content')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection
