
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order-history</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

<body>
    <div class="info-customer pt-5">
        <div class="container mx-auto">
            <div class="">
                <div class="md:flex w-full">
                    <div class="md:w-1/3 mt-5 w-full menu p-15 box-border inset-y-0 left-0 static mr-20">
                        <div class="shadow">
                            <div class="headbox bg-neutral-300 rounded-t-lg pl-5 py-3 pr-20 w-full">
                                <p class="text-xl">Tài Khoản Của</p>
                                <p class="font-bold	text-2xl">Phan Đức Hòa</p>
                            </div>
                            <div class="list-menu p-3 ">
                                <ul>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a
                                            href="./info-customer.html">Thông
                                            tin khách hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a
                                            href="./customer-addresses.html">Sổ địa chỉ</a>
                                    </li>
                                    <li class="border-b py-3 items-menu active text-[#00b041]"><a
                                            href="./order-history.html">Lịch sử mua
                                            hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="./customer-changepassword.html">Đổi mật
                                            khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 mt-5 w-full center-2 inset-y-0 right-0 static ">
                        <h2 class="text-3xl font-bold hover:text-[#006a31]">Tra cứu đơn hàng</h2>
                        <div class="table table-address shadow mt-8 rounded-lg pl-6 md:pr-20 pr-5 py-5 w-full">
                            <table class="rounded-lg w-full">
                                <form action="" method="post">
                                    <label class="block py-2">
                                        <span
                                            class="after:content-['*'] py-2 after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700 font-extrabold text-xl">
                                            Nhập số điện thoại hoặc mã đơn hàng
                                        </span>
                                        <input type="email" name="email"
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                            placeholder="Nhập số điện thoại hoặc mã đơn hàng" />
                                    </label>
                                    <div class="flex justify-start pt-2">
                                        <button type="submit"
                                            class="inline-flex justify-center px-10 py-2 text-sm font-medium text-[#fff] bg-[#006a31] border border-transparent rounded-md hover:bg-[#fff] hover:text-[#006a31] focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#006a31]">
                                            Tra cứu
                                        </button>
                                </form>
                            </table>

                        </div>
                        
                        <div class="mt-5 w-full center-2 inset-y-0 right-0 static ">
                            <h2 class="text-3xl font-bold hover:text-[#006a31]">Lịch sử đơn hàng</h2>

                            <table style="margin-top: 15px;" class="p-6 rounded-lg w-full">
                                <tbody>
                                    <thead>
                                        <tr class="border-0">
                                            <th class="code w-1/5 py-3 bg-[#eee] text-center">Mã</th>
                                            <th class="code w-1/5 py-3 bg-[#eee] text-center">Sản Phẩm</th>
                                            <th class="code w-1/5 py-3 bg-[#eee] text-center">Ngày mua</th>
                                            <th class="code w-1/5 py-3 bg-[#eee] text-center">Tổng tiền</th>
                                            <th class="code w-1/5 py-3 bg-[#eee] text-center">Trạng thái</th>
                                        </tr>
                                    </thead>
                                </tbody>
                                <tbody>
                                    <thead>
                                        <tr class="border-0">
                                            <th class="code w-1/5 py-3 text-center">1216613</th>
                                            <th class="code w-1/5 py-3 text-center">H &amp; M</th>
                                            <th class="code w-1/5 py-3 text-center">06/10/2023</th>
                                            <th class="code w-1/5 py-3 text-center">119.000đ</th>
                                            <th class="code w-1/5 py-3 text-center text-[#006a31]">Đã xác nhận</th>
                                        </tr>
                                    </thead>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>