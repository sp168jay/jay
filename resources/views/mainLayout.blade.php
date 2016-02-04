<html>
    <head>
        <title> 標題 @yield('titleTest')</title>
    
    </head>
    <body>
        <h1>主要內容</h1>
        @section('menu')
            mainLayout 選單<br>
        @show
        
        <div class="test">
            mainLayout 放一些內容<br><br>
            @yield('testContent')
        </div>
    </body>

</html>