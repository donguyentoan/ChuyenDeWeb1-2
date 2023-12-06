<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Tin tức & sự kiện</title>
</head>

<body>
    @include("Component.Header")
    <div class="container  mx-auto">
        <div class="p-10 text-3xl">
            <strong>Tin tức & sự kiện</strong>
        </div>
        <div class="flex flex-col">
            @foreach($newPost as $item)
            <div class="p-10">
                <div class="h-full border-2 rounded-lg shadow-lg hover:border-emerald-400">
                    <div class="md:flex container">

                        <div class="p-10 md:w-4/12 w-full">
                            <img class="w-full h-full object-center" src="./image/{{$item->image}}" alt="blog">
                        </div>

                        <div class="p-10 md:w-8/12 w-full">
                            <div class="md:text-2xl text-xl hover:text-green-700">

                                <a href="{{url('/detailPost/'.$item->id)}}">
                                    <strong>{{$item->title}}</strong>
                                </a>
                            </div>
                            <div class="md:text-xl text-lg">
                                {{ Str::limit($item->content, $limit = 100, $end = '...') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include("Component.Footer")
</body>

</html>