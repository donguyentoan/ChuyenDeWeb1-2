<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order-history</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./build/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>
    .td-titles {
        width: 30%;
    }


    .items-menu {
        position: relative;
    }


    .items-menu:hover::before {
        position: absolute;
        content: "";
        display: block;
        /* Hiển thị pseudo-element */
        border-left: 3px solid #00b041;
        /* Đường viền bên trái */
        height: 100%;
        /* Chiều cao của pseudo-element bằng với phần tử chính */
        left: -15px;
        /* Đặt vị trí bên trái */
        top: 0;
        /* Đặt vị trí bên trên */
    }


    .active::before {
        position: absolute;
        content: "";
        display: block;
        /* Hiển thị pseudo-element */
        border-left: 3px solid #00b041;
        /* Đường viền bên trái */
        height: 100%;
        /* Chiều cao của pseudo-element bằng với phần tử chính */
        left: -15px;
        /* Đặt vị trí bên trái */
        top: 0;
        /* Đặt vị trí bên trên */
    }


    .pen-edit {
        width: 15px;
        height: 15px;
        margin-right: 5px;
    }
    </style>
</head>
@include('Component.Header')


<body>
    <div class="info-customer pt-5 pb-5">
        <div class="container mx-auto">
            <div class="">
                <div class="md:flex w-full mb-10">
                    <div class="md:w-1/3 mt-5 w-full menu p-15 box-border inset-y-0 left-0 static mr-20">
                        <div class="shadow">
                            <div class="headbox bg-neutral-300 rounded-t-lg pl-5 py-3 pr-20 w-full">
                                <p class="text-xl">Tài Khoản Của</p>
                                <p class="font-bold text-2xl">{{$user->name}}</p>
                            </div>
                            <div class="list-menu p-3 ">
                                <ul>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a
                                            href="/inforCustomer">Thông
                                            tin khách hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a
                                            href="/customerAddress">Sổ địa chỉ</a>
                                    </li>
                                    <li class="border-b py-3 items-menu active text-[#00b041]"><a href="#">Lịch sử mua
                                            hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a
                                            href="/customerChangepassword">Đổi mật
                                            khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 mt-5 w-full center-2 inset-y-0 right-0 static ">


                        <div class="mt-5 w-full center-2 inset-y-0 right-0 static ">
                            <h2 class="text-3xl font-bold hover:text-[#006a31]">Lịch sử đơn hàng</h2>


                            <table style="margin-top: 15px;" class="p-6 rounded-lg w-full">
                                @if(isset($delivery_informations))
                                @if(count($orders) != 0)
                                <thead>
                                    <tr class="border-0">
                                        <!-- Table headers here -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders)
                                    @for($i = 0; $i < count($orders); $i++) <tr class="border-0">
                                        <!-- Table data here -->
                                        </tr>
                                        @endfor
                                        @endif
                                </tbody>
                                @else
                                <div class="text-xl py-3 text-center text-[#006a31]"><strong>Chưa có đơn hàng
                                        nào</strong></div>
                                @endif
                                @else
                                <div class="text-xl py-3 text-center text-[#006a31]"><strong>Chưa có đơn hàng
                                        nào</strong></div>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('Component.Footer')


</html>