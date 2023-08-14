<div>
    <h1>Client ID: {{ $client->id }}</h1>
    <p>Name: {{ $client->name }}</p>
    <p>Email: {{ $client->email }}</p>
    <p>Phone: {{ $client->phone }}</p>
    <p>Address: {{ $client->address }}</p>
    <p>Services:</p>
    <ul>
        @foreach ($client->services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
    </ul>
