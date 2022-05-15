<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cliente</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cliente
                    </div>
                    <div class="card-body">
                        {!! Form::model($client, ['route' => ['client.update', $client], 'method' =>'PUT']) !!}
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="first_name" value="{{$client->first_name}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="last_name" value="{{$client->last_name}}" disabled>
                        </div>
                        {!! Form::label('lat', "Latitude", ['class'=> 'col-sm-2 col-form-label col-form-label-sm']) !!}
                        <div class="mb-3">
                            {!! Form::text('lat', null, ['class' => 'form-control form-control-sm' . ($errors->has('lat')
                            ? ' is-invalid' : ''), 'maxlength'=>120]) !!} @if ($errors->has('lat'))
                            <span class="invalid-feedback">{{ $errors->first('lat') }}</span> @endif
                        </div>
                        {!! Form::label('lng', "Longitud", ['class'=> 'col-sm-2 col-form-label col-form-label-sm']) !!}
                        <div class="mb-3">
                            {!! Form::text('lng', null, ['class' => 'form-control form-control-sm' . ($errors->has('lng')
                            ? ' is-invalid' : ''), 'maxlength'=>120]) !!} @if ($errors->has('lng'))
                            <span class="invalid-feedback">{{ $errors->first('lng') }}</span> @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="/" class="btn btn-secondary">Regresar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>