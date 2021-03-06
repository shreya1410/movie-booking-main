<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="app">

            <div class="flex bg-gray-100 border-b border-gray-300 py-4">
                <div class="container mx-auto">
                    <router-link  class="mr-4" to='/'>Home</router-link>
                    <router-link class="mr-4" to='/movie'>Movie</router-link>
                    <router-link class="mr-4" to='/cast'>Cast</router-link>
                    <router-link class="mr-4" to='/theatre'>Theatre</router-link>
{{--                    <router-link class="mr-4" to='/theatredetail'>Theatre Layout</router-link>--}}
                           </div>
            </div>
            <div class="container mx-auto">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

