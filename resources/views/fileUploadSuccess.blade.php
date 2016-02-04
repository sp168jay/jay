<html>
    <head>
    </head>
    <body>
        @foreach ($datas as $data)
            <h1>{{ $data->by_user }}</h1>
            <p>{{ $data->description }}</p>
        @endforeach
    </body>
</html>