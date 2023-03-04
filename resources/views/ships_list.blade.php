@extends('layouts.public_layout')

@section('title', 'Solitudes de Envio | EYA Admin')

@section('body')
    @livewire('search')
    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        const deleteShip = async (id) => {
            const confirmed = confirm('Desea borrar este elemento?')
            if (confirmed) {
                const res = await fetch(APP_URL + '/admin/ship-delete/' + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (res.status == 200) {
                    document.getElementById('ship_' + id).remove();
                }
            }
        }
    </script>
@endsection
