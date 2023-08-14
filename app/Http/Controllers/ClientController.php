<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        $array = [];
        foreach ($clients as $client) {
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->address,
                'services' => $client->services
            ];
        }

        // return response()->json($array);
        if(request()->wantsJson()) {
            return response()->json($array);
        } else {
            return view('clients.index')->with([
                'clients' => $array,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        $data = [
            'message' => 'Cliente creado correctamente',
            'client' => $client
        ];

        if(request()->wantsJson()) {
            return response()->json($data);
        } else {
            // $clients = Client::all(); // Obtener la lista actualizada de clientes
            // return view('clients.index')->with([
            //     'clients' => $clients
            // ]);
            // return view('clients.index');
            return redirect()->route('clients.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $data = [
            'message' => 'Detalles del cliente',
            'client' => $client,
            'services' => $client->services
        ];
        // return response()->json($client);
        // return response()->json($client->services);
        if(request()->wantsJson()) {
            return response()->json($data);
        } else {
            return view('clients.show')->with([
                // 'services' => Service::all(),
                'client' => $client
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit')->with([
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        $data = [
            'message' => 'Cliente actualizado correctamente',
            'client' => $client
        ];

        if(request()->wantsJson()) {
            return response()->json($data);
        } else {
            return redirect()->route('clients.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        $data = [
            'message' => 'Cliente eliminado correctamente',
            'client' => $client
        ];

        if(request()->wantsJson()) {
            return response()->json($data);
        } else {
            return redirect()->route('clients.index');
        }
    }

    public function attach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);

        $data = [
            'message' => 'Servicio asignado correctamente',
            'client' => $client
        ];

        return response()->json($data);
    }

    public function detach(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);

        $data = [
            'message' => 'Servicio desasignado correctamente',
            'client' => $client
        ];

        return response()->json($data);
    }
}
