<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pokédex Vue.js App</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>

<div id="app">

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h1>Pokédex</h1>
            </div>
            <div class="col-md-2 ml-auto">
                <p>Created By Aidan Woodhall</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <pokemon-list></pokemon-list>
            </div>
        </div>
    </div>

</div>

<script async src="{{mix('js/app.js')}}"></script>
</body>
</html>