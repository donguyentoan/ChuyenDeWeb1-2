<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$detailPost->title}}</title>
</head>

<body>
    @include("Component.Header")
    <div class="container  mx-auto">
        <div class="p-10 text-3xl">
            <strong>{{$detailPost->title}}</strong>
        </div>
        <div class="p-10">
            <div class="flex justify-center items-center">
                <img class="pb-8" src="./image/{{$detailPost->image}}" alt="">
            </div>
            {{$detailPost->content}}
        </div>
    </div>
    @include("Component.Footer")
</body>

</html>