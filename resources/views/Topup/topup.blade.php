<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../../assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="../../assets/jquery-1.11.3.min.js"></script>

    
    
</head>

<body >
    @include('Component.Header')
    <section class="bg-gray-200">
      
        <div class="container mx-auto pt-5 p-10">
            <div class="flex">
                <div class="w-1/2 border-r-2 pr-2 border-gray-500">
                    <div class="table-responsive">
                        <form action="/vnpay_create_payment" id="frmCreateOrder" method="post">
                        @csrf 
                        
                                    <div class="form-group">
                                        <label class="text-lg font-bold" for="amount">Số Tiền Nạp Vào Ví Điện Tử </label>
                                        <input class=" mt-2 mb-2  h-10 form-control border-[1px] border-black-500 w-full " data-val="true" data-val-number="The field Amount must be a number."  id="amount" max="100000000" min="1" name="amount" type="text" value="" />
            
            
                                    </div>
                               
                             
            
                            
                                <h4 class="text-xl pt-3 font-bold" >Chọn Phương Thức Nạp tiền</h4>
                                    <div class=" items-center justify-around pt-5">
                                        <div class="tao ">
                                            
                                            <div class="form-group pt-1">
                                                <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                                                <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                                                <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
            
                                                <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                                                <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                                                <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
            
                                                <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                                                <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
            
                                                <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                                                <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
            
                                            </div>
            
                                        </div>
                                    
                                        <div class="form-group">
                                            <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                                            <input type="radio" id="language" Checked="True" name="language" value="vn">
                                            <label for="language">Tiếng việt</label><br>
                                            <input type="radio" id="language" name="language" value="en">
                                            <label for="language">Tiếng anh</label><br>
            
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-default bg-gradient-to-r from-cyan-500 to-blue-500 px-5 py-2 mt-10 " href>Thanh toán</button>
            
                          
                            
                        </form>
                    </div>
                </div>
                <div class="w-1/2 border-l-2  border-gray-500  ">
                    <div> 
                        <h1 class="ml-4  text-xl font-bold pb-4">Lịch Sử Giao Dịch</h1>
                        <h1 class="ml-4  text-xl font-bold pb-4">Số Tiền Trong Ví : {{$wallet->balance}} </h1>

                    </div>
                   
                     <div class="w-full h-96 ml-4  bg-white rounded-md">
                        
                        @foreach($walletTransaction as $walletMessage)
                        <p class="pl-2">
                            {{$walletMessage->message}}
                        </p>
            
                        @endforeach
                     </div>
                </div>

            </div>

           
           
           
        
        </div>
        
    </section>
    @include('Component.Footer')
</body>

</html>