<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Payment</title>
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
        <div class="w-1/7">
            @include('component.SideBar')
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs flex">




            <div class="w-full overflow-x-auto">


                @include('component.NavBarDashBoard')

                @if (session('success'))
                <div id="success-message"
                    class="bg-white border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-5 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">Message ^.^</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="button_add flex justify-between items-center mr-3">
                    <form action="/searchProductDashboard" method="get">
                        <div class="flex justify-center items-center md:w-[400px] w-[90%]  md:pl-8">
                            <div class="space-y-10  ">
                                <div class="flex items-center p-1 space-x-6 h-[40px] bg-white rounded-xl  ">
                                    <div
                                        class="flex bg-gray-100 flex items-center px-2 h-[35px] md:w-72 w-52 space-x-4 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-30" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        <input class="bg-gray-100 outline-none placeholder:text-sm" type="text"
                                            name="name" placeholder="Article name or keyword..." />
                                    </div>
                                    <div
                                        class="bg-[#0cb0d8] py-1.5 px-5 text-white font-semibold rounded-lg  transition duration-3000 ">
                                        <input class="text-sm" type="submit" value="Search">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a href="/AddProduct"><button
                            class="flex  mx-auto  text-white bg-gradient-to-r from-cyan-500 to-blue-500 border-0 py-2 px-9 m-5  rounded text-xs">Add
                            Product</button>
                    </a>
                </div>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3 text-center">ID_Order</th>
                            <th class="px-4 py-3 text-center">Mã Đơn Hàng</th>
                            <th class="px-4 py-3 text-center">Số Tiền </th>
                            <th class="px-4 py-3 text-center">Nội Dung Đơn Hàng</th>
                            <th class="px-4 py-3 text-center">Phản Hồi</th>
                            <th class="px-4 py-3 text-center">Mã Giao Dịch</th>
                            <th class="px-4 py-3 text-center">Mã Ngân Hàng</th>
                            <th class="px-4 py-3 text-center">Thời Gian</th>
                            <th class="px-4 py-3 text-center">Kết Quả</th>
                            <th class="px-4 py-3 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($payment as $payments)
                        <tr class="text-gray-700 dark:text-gray-400 items-center">
                            <!-- id order -->
                            <td class="px-3 py-3 text-center text-sm w-1/12">
                                {{$payments->id_oder}}
                            </td>
                            <!-- ma don hang -->
                            <td class="px-3 py-3 text-center w-1/12 text-sm">
                                {{$payments->madonhang}}
                            </td>
                            <!-- So tien -->
                            <td class="px-3 py-3 text-center w-1/12 text-sm">
                                {{$payments->sotien}}
                            </td>
                            <!-- Noi dung don hang -->
                            <td class="px-3 py-3 text-center w-3/12 text-sm">
                                {{$payments->noidung}}
                            </td>
                            <!-- Phan Hoi -->
                            <td class="px-3 py-3 text-center w-1/12 text-sm">
                                {{$payments->maphanhoi}}
                            </td>
                            <!-- Ma giao dich -->
                            <td class="px-4 py-3 text-center text-sm w-1/12">
                                {{$payments->magiaodich}}
                            </td>
                            <!-- Ma ngan hang -->
                            <td class="px-4 py-3 text-center text-xs w-1/12">
                                <span
                                    class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                    {{$payments->manganhang}}
                                </span>
                            </td>
                            <!-- Thoi gian -->
                            <td class="px-4 py-3 text-center text-sm w-1/12">
                                {{$payments->thoigian}}
                            </td>
                            <!-- Ket qua -->
                            <td class="px-4 py-3 text-center text-sm w-1/12">

                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{$payments->ketqua}}
                                </p>

                            </td>
                            <!-- button xóa sửa -->
                            <td class="px-4 py-3 text-center 2/12">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="#0fb1d8" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="#0fb1d8" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="panigation p-8 ">

                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hiển thị thông báo
        var successMessage = document.getElementById("success-message");
        successMessage.style.display = "block";




        // Ẩn thông báo sau 5 giây
        setTimeout(function() {
            successMessage.style.display = "none";
        }, 3000);
    });
    </script>
</body>




</html>