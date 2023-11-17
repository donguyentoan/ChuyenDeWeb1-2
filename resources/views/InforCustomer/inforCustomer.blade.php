
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info-customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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

<body>
    <div class="info-customer pt-5">
        <div class="container mx-auto">
            <div class="">
                <div class="md:flex w-full" >
                    <div class="md:w-1/3 mt-5 w-full menu p-15 box-border inset-y-0 left-0 static mr-20">
                        <div class="shadow">
                            <div class="headbox bg-neutral-300 rounded-t-lg pl-5 py-3 pr-20 w-full">
                                <p class="text-xl">Tài Khoản Của</p>
                                <p class="font-bold	text-2xl">Phan Đức Hòa</p>
                            </div>
                            <div class="list-menu p-3 ">
                                <ul>
                                    <li class="border-b py-3 items-menu active text-[#00b041]"><a href="/">Thông
                                            tin khách hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/customerAddress">Sổ địa chỉ</a>
                                    </li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="./order-history.html">Lịch sử mua
                                            hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="./customer-changepassword.html">Đổi mật
                                            khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 mt-5 w-full center-2 inset-y-0 right-0 static ">
                        <h2 class="text-3xl font-bold hover:text-[#006a31]">Thông tin chung</h2>
                        <div class="table table-address shadow mt-8 rounded-lg ">
                            <table class="p-6 rounded-lg w-full">
                                <tbody>
                                    <tr class="border-0">
                                        <td class="no-underline font-bold text-xl text-[#006a31]" colspan="2">Thông tin
                                            tài khoản</td>
                                        <td
                                            class="no-underline edit-wrapper td-edit text-right flex justify-end text-[#068fdd]">
                                            <a class="edit flex" href="./info-customer-edit.html"><em class=""></em> <svg class="fill-[#068fdd]"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Họ và tên</td>
                                        <td class="no-underline" colspan="2">Đức Hoà Phan</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Số điện thoại</td>
                                        <td class="no-underline" colspan="2">0365114930</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Email</td>
                                        <td class="no-underline" colspan="2">hoaphan5096@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table table-address shadow mt-8 rounded-lg ">
                            <table class="p-6 rounded-lg w-full">
                                <tbody>
                                    <tr class="border-0">
                                        <td class="no-underline font-bold text-xl text-[#006a31]" colspan="2">Sổ Địa Chỉ
                                        </td>
                                        <td
                                            class="no-underline edit-wrapper td-edit text-right flex justify-end text-[#068fdd]">
                                            <a class="edit flex" href="./customer-addresses.html"><em class=""></em> <svg class="fill-[#068fdd]"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                                </svg>Chỉnh sửa</a>
                                        </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Họ và tên</td>
                                        <td class="no-underline" colspan="2">Đức Hoà Phan</td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Địa Chỉ</td>
                                        <td class="no-underline" colspan="2"> 323, abc, Quận Tân Bình, Phường 7, Thành
                                            phố Hồ Chí Minh, Việt Nam </td>
                                    </tr>
                                    <tr class="border-0">
                                        <td class="no-underline td-titles">Điện Thoại</td>
                                        <td class="no-underline" colspan="2">01234567890</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table table-history shadow mt-8">
                            <p class="font-bold text-xl text-[#006a31]">ĐƠN HÀNG GẦN ĐÂY NHẤT</p>

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