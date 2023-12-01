<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add Manufacture</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="build/css/tailwind.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="/build/js/app.js"></script>
</head>

<body>

    <div class="div flex">
        <!-- SideBar -->
        <div class="w-1/7">
            @include('component.SideBar')
        </div>
        <!-- EndSideBar -->

        <div class="w-full overflow-hidden rounded-lg shadow-xs bg-[#fff]">
            @include('component.NavBarDashBoard')
            <form action="/uploads" method="post" enctype="multipart/form-data" class="m-10">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Name</label>
                    <input type="text" id="name" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-200 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập tên sản phẩm" required>
                    @if ($errors->has('name'))
                    <p class="help is-danger text-red-500 font-semibold">{{ $errors->first('name') }}</p>
                    @endif

                </div>
               

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="img-product">Upload
                        Image</label>
                    <div class="flex items-center ">
                        <div class="mt-1 text-sm text-gray-500 text-gray-300" id="user_avatar_help">
                            <div class="relative hidden w-28  h-28 object-contain mr-3 rounded-full md:block">
                                <img class="object-contain w-full h-full " alt="" loading="lazy" id="output"
                                    src="/image/imageDefault.png" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                        </div>
                        <input id="Image" type="file" name="Image" accept="Image/*" onchange="loadFile(event)"
                            class=" p-2 block h-12 w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white  focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                            aria-describedby="user_avatar_help">
                    </div>
                    <div class="mt-1 text-sm text-black" id="user_avatar_help">Tải hình ảnh sản phẩm lên</div>

                </div>
                @if ($errors->has('image'))
                <p class="help is-danger text-red-500 font-semibold">{{ $errors->first('image') }}</p>
                @endif

                <div class="mb-6">
                    <label for="Phone"
                        class="block mb-2 text-sm font-medium text-gray-900 text-black">Phone</label>
                    <input type="text" id="Phone" name="Phone"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-200 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập giá sản phẩm" required>

                    @if ($errors->has('Phone'))
                    <p class="help is-danger text-red-500 font-semibold">{{ $errors->first('Phone') }}</p>
                    @endif
                </div>
                <!--  -->
                <div class="mb-6">
                    <label for="Address"
                        class="block mb-2 text-sm font-medium text-gray-900 text-black">Address</label>
                    <input type="text" id="Address" name="Address"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-200 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập mô tả sản phẩm" required>

                    @if ($errors->has('Address'))
                    <p class="help is-danger text-red-500 font-semibold">{{ $errors->first('Address') }}</p>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="Representative"
                        class="block mb-2 text-sm font-medium text-gray-900 text-black">Representative</label>
                    <input type="text" id="Representative" name="Representative"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-200 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập mô tả sản phẩm" required>

                    @if ($errors->has('Representative'))
                    <p class="help is-danger text-red-500 font-semibold">{{ $errors->first('Representative') }}</p>
                    @endif
                </div>


                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add
                    Manufacture</button>
            </form>
        </div>
    </div>
</body>

</html>