@extends('layouts.public_layout')

@section('body')
    <h1>Ingresar al admin</h1>
    <form action="/authenticate" method="POST">
        @csrf
        @if (session('error'))
            <div class="alert alert-danger">Hubo un error con las credenciales ingresadas.</div>
        @endif
        <div class="form-group my-3">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" />
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control" />
            @error('password')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
@endsection
