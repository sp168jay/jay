<html>
    <head>
    </head>
    <body>
<!--        解析傳到 view 的變數，是一個陣列-->
        @foreach ($datas as $data)
        <h1>{{ $data->by_user }}</h1>
        <p>{{ $data->description }}</p>
        @endforeach
    </body>
</html>