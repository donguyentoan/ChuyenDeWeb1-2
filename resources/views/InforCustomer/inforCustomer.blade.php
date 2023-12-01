<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
</head>
    <style>
        .center-2 .table {
            padding: 15px;
        }

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
    <div class="info-customer mt-10 mb-20">
        <div class="container mx-auto">
            <div class="">
                <div class="md:flex w-full mb-10">
                    <div class="md:w-1/3 mt-5 w-full menu p-15 box-border inset-y-0 left-0 static mr-20">
                        <div class="shadow">
                            <div class="headbox bg-neutral-300 rounded-t-lg pl-5 py-3 pr-20 w-full">
                                <p class="text-xl">Tài Khoản Của</p>
                                <p class="font-bold	text-2xl">{{$user->name}}</p>
                            </div>
                            <div class="list-menu p-3 ">
                                <ul>
                                    <li class="border-b py-3 items-menu active text-[#00b041]"><a href="#">Thông
                                            tin khách hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/customerAddress">Sổ địa chỉ</a>
                                    </li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/orderHistory">Lịch sử mua
                                            hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/customerChangepassword">Đổi mật
                                            khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 mt-5 w-full center-2 inset-y-0 right-0 static ">
                        <h2 class="text-3xl font-bold hover:text-[#006a31]">Thông tin chung</h2>
                        <div class="table table-address shadow mt-8 rounded-lg w-full">
                            <table class="p-6 rounded-lg w-full">
                                <tbody>
                                    <tr class="border-0">
                                        <td class="no-underline font-bold text-xl text-[#006a31]" colspan="2">Thông tin
                                            tài khoản</td>

                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Tên tài khoản</td>
                                        <td class="no-underline" colspan="2">{{$user->name}}</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Số điện thoại</td>
                                        <td class="no-underline" colspan="2">{{$user->phone}}</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Email</td>
                                        <td class="no-underline" colspan="2">{{$user->email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table table-address shadow mt-8 rounded-lg w-full">
                            <table class="p-6 rounded-lg w-full">
                                <tbody>
                                    <tr class="border-0">
                                        <td class="no-underline font-bold text-xl text-[#006a31]" colspan="2">Sổ Địa Chỉ
                                        </td>
                                        <td class="no-underline edit-wrapper td-edit text-right flex justify-end text-[#068fdd]">
                                            <a class="edit flex" href="/customerAddress"><em class=""></em> <svg class="fill-[#068fdd]" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Họ và tên</td>
                                        <td class="no-underline" colspan="2">{{($delivery_informations) ? $delivery_informations->name : 'Chưa tạo'}}

                                        </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Địa Chỉ</td>
                                        <td class="no-underline" colspan="2"> {{($delivery_informations) ? $delivery_informations->apartmentNumber . ', ' . $delivery_informations->details .', '.$delivery_informations->StreetNames : 'Chưa tạo'}}
                                        </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Điện Thoại</td>
                                        <td class="no-underline" colspan="2">{{($delivery_informations) ? $delivery_informations->phone : 'Chưa tạo'}}
                                        </td>
                                    </tr>
                                </tbody>
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