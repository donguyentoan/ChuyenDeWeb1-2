<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1>Love Items</h1>

    <ul>
        @foreach ($loveItems as $loveItem)
        <li>{{ $loveItem->name }}</li>
        @endforeach
    </ul>

    <form action="{{ route('love-items.store') }}" method="POST">
        @csrf
        <input type="text" name="name" required>
        <button type="submit">Add Love Item</button>
    </form>
</body>

</html>