<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Clientes</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <form action="/load-clients">
                            <button class="btn btn-primary" onclick="cargando()">Cargar clientes</button>
                            <p id="loading"></p>
                        </form>
                    </div>

                    @if (!empty($msj))
                    <div class="alert alert-success" role="alert">
                        {{ $msj }}
                    </div>
                    @endif

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->first_name}}</td>
                                    <td>{{$client->last_name}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>
                                        <form action="/client/{{$client->id}}/edit">
                                            <button class="btn btn-success">Editar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="panel-footer">
                            <div class="col-sm-4">
                                <div role="status" aria-live="polite">
                                    {{ trans_choice('Mostrando :count a ', ($clients->currentpage()-1)*$clients->perpage()+1) }} {{ $clients->currentpage()*$clients->perpage()
                    }} {{ trans_choice(' de :count registros', $clients->total()) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function cargando() {
        document.getElementById('loading').innerHTML = 'Cargando...';
    }
</script>

</html>