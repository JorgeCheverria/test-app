<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate();
        return view('welcome', ['clients'=> $clients]);
    }

    public function loadClients()
    {
        $clients = [];
        $count = 0;
        if (($open = fopen(storage_path() . "/clients.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($open, 2000, ",")) !== FALSE) {
                $clients[] = $data;
                if($count>0){
                    $client = Client::firstOrNew(
                        [
                            'first_name' => $data[1],
                            'last_name' => $data[2],
                            'email' => $data[3],
                        ],
                        [
                            'gender' => $data[4],
                            'company' => $data[5],
                            'city' => $data[6],
                            'title' => $data[7],
                        ]
                    );
                    $client->save();
                }
                $count++;
            }

            fclose($open);
        }
        $clients = Client::paginate();
        //return view('welcome', ['clients' => $clients, 'msj' =>'Se cargaron clientes']);
        return redirect()->route('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client_edit', ['client' => $client])->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $client = Client::find($id);
        $client->lat = $request->lat;
        $client->lng = $request->lng;
        $client->save();
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
