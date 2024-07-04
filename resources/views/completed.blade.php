<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completed Todos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    @livewireStyles
</head>

<body>
    <div>

        <h1 class="text-3xl font-bold mb-5 mt-10" style="text-align:center;color:rgb(1, 1, 74)">Completed Todos</h1>
        <a href="{{ route('home', ['page' => auth()->user()->id]) }}" style="position: absolute ;right: 10%; top: 5%;"
            title="home">
            <i class="fa-solid fa-house" style="font-size: 25px;color: rgb(1, 1, 74); "></i>
        </a>
    </div>
    @livewire('completed-todo')
    @livewireScripts
</body>

</html>
