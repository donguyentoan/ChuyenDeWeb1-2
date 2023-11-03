<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
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
            <form action="/uploads" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 text-black">Name</label>
                    <input type="text" id="name" name="name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 text-black">Description</label>
                    <input type="text" id="description" name="description"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập mô tả sản phẩm" required>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="img-product">Upload
                        Image</label>
                    <input id="image" type="file" name="image"
                        class=" p-2 block w-full text-sm text-gray-400 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                        aria-describedby="user_avatar_help" >
                    <div class="mt-1 text-sm text-white text-gray-300" id="user_avatar_help">Tải hình ảnh sản
                        phẩm lên</div>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 text-black">Price</label>
                    <input type="text" id="price" name="price"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 shadow-sm-light"
                        placeholder="Nhập giá sản phẩm" required>
                </div>
                <!--  -->
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 text-black">Choose
                        product classification</label>
                    <select id="categorie" name="categorie"
                        class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500" >

                        @foreach ($categories as $category)
                        <option class="text-white" name="categorie" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 text-black">Choose
                        manufacture classification</label>
                    <select id="manufacture" name="manufacture"
                        class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500" >

                        @foreach ($manufactures as $manufacture)
                        <option name="manufacture" value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                        @endforeach

                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Add
                    Product</button>
            </form>
        </div>
    </div>
</body>

</html>