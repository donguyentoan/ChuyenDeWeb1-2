<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="build/css/tailwind.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<body>

    <div class="div flex">
        <!-- SideBar -->
        <div class="w-1/7">
            @include('component.SideBar')
        </div>
        <!-- EndSideBar -->

        <div class="w-full overflow-hidden rounded-lg shadow-xs bg-[#0cb1d8] p-10">
            <form action="/updateUser/{{$user->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Name</label>
                    <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nhập tên sản phẩm" required value="{{ $user->name }}">
                </div>

                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 text-black">Phone</label>
                    <input type="text" id="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nhập tên sản phẩm" required value="{{ $user->phone }}">
                    @if($errors->has('phone'))
                    <div class="alert alert-danger  text-red-500">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-black">email</label>
                    <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nhập tên sản phẩm" required value="{{ $user->email }}">
                    @if($errors->has('email'))
                    <div class="alert alert-danger  text-red-500">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-black">Password</label>
                    <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 shadow-sm-light" placeholder="Nhập tên sản phẩm" required value="{{ $user->name }}">
                    @if($errors->has('password'))
                    <div class="alert alert-danger  text-red-500">{{ $errors->first('password') }}</div>
                    @endif
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Edit
                    User</button>
            </form>

        </div>
    </div>
</body>

</html>