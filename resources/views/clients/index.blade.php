<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de los clientes</title>
</head>
<body>
    <a href="{{ route('clients.create') }}">Crear nuevo cliente</a>
    {{-- @foreach ($clients as $client)
        <div>
            <h1>Client ID: {{ $client['id'] }}</h1>
            <p>Name: {{ $client['name'] }}</p>
            <p>Email: {{ $client['email'] }}</p>
            <p>Phone: {{ $client['phone'] }}</p>
            <p>Address: {{ $client['address'] }}</p>
            <p>Services: {{ $client['services'] }}</p>
        </div>
    @endforeach --}}

    @foreach ($clients as $client)
        <div>
            <h1>Client ID: {{ $client['id'] }}</h1>
            <p>Name: {{ $client['name'] }}</p>
            {{-- <p>Email: {{ $client['email'] }}</p>
            <p>Phone: {{ $client['phone'] }}</p>
            <p>Address: {{ $client['address'] }}</p>
            <p>Services:</p> --}}
            <ul>
                @foreach ($client['services'] as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
            <a href="{{ route('clients.show', ['client' => $client['id']]) }}">VER</a>
            <a href="{{ route('clients.edit', ['client' => $client['id']]) }}">Editar</a>
            <form action="{{ route('clients.destroy', ['client' => $client['id']]) }}" method="POST" class="form-check-inline" onsubmit="return confirm('¿Seguro que quiere eliminar este usuario?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" role="button">Eliminar</button>
            </form>
        </div>
    @endforeach
</body>
</html>
