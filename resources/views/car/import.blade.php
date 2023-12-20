<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form action="{{route('car.store')}}" method="POST">
        @csrf
        Brand:
        <input type="text" name="brand" autofocus><br>
        Model:
        <input type="text" name="model"><br>
        Price:
        <input type="number" name="price"><br><br>
        <button type="submit">Wyślij</button>
    </form>
</body>
</html>