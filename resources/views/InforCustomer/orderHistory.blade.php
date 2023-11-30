<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order-history</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
                <div class="md:flex w-full">
                    <div class="md:w-1/3 mt-5 w-full menu p-15 box-border inset-y-0 left-0 static mr-20">
                        <div class="shadow">
                            <div class="headbox bg-neutral-300 rounded-t-lg pl-5 py-3 pr-20 w-full">
                                <p class="text-xl">Tài Khoản Của</p>
                                <p class="font-bold text-2xl">{{$user->name}}</p>
                            </div>
                            <div class="list-menu p-3 ">
                                <ul>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/inforCustomer">Thông
                                            tin khách hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/customerAddress">Sổ địa chỉ</a>
                                    </li>
                                    <li class="border-b py-3 items-menu active text-[#00b041]"><a href="#">Lịch sử mua
                                            hàng</a></li>
                                    <li class="border-b py-3 items-menu hover:text-[#00b041]"><a href="/customerChangepassword">Đổi mật
                                            khẩu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 mt-5 w-full center-2 inset-y-0 right-0 static ">


                        <div class="mt-5 w-full center-2 inset-y-0 right-0 static ">
                            <h2 class="text-3xl font-bold hover:text-[#006a31]">Lịch sử đơn hàng</h2>


                            <table style="margin-top: 15px;" class="p-6 rounded-lg w-full">
                                @if( isset($delivery_informations) )
                                @if(count($orders) != 0 )
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

                                  
                                        @for ($i = 0 ; $i < count($orders); $i++ ) <thead>
                                            <tr class="border-0">
                                                
                                                <th class="code w-1/5 py-3 text-center">{{$orders[$i]->id}}</th>
                                                <th class="code w-1/5 py-3 text-center">{{$products[$i]->name}}</th>
                                                <th class="code w-1/5 py-3 text-center">{{$orders[$i]->deliveryInformation_date}}</th>
                                                <th class="code w-1/5 py-3 text-center">{{$orders[$i]->total_amount}} đ</th>
                                                <th class="code w-1/5 py-3 text-center text-[#006a31]">{{($orders[$i]->status == 1 ? 'Đã xác nhận' : 'Chưa xác nhận')}}</th>
                                            </tr>
                                            </thead>
                                            @endfor
                                    
                                </tbody>
                                @else
                                <div class="text-xl py-3 text-center text-[#006a31]"><strong> Chưa có đơn hàng nào</strong> </div>
                                @endif
                                @else
                                <div class="text-xl py-3 text-center text-[#006a31]"><strong> Chưa có đơn hàng nào</strong> </div>
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



