<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('Component.Header')

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center ">
          <div class=" mt-6  lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-2xl text-xl mb-4 font-bold text-gray-900">Menu Thật Chất</h1>
                <p class="mb-8 leading-relaxed">PIZZA kết hợp cùng BÁNH MÌ và HÁT BỘI?
                    Mối quan hệ tưởng chừng không liên quan nhưng mời bạn khám phá điều thú vị này qua lăng kính "Thật Chất" của The Pizza Company nhé!
                    Hát bội - Một loại hình nghệ thuật được du nhập, cải biên và trở thành di sản văn hoá phi vật thể trong đời sống tinh thần của người Việt Nam từ nhiều thế hệ trước.
                    Mối quan hệ tưởng chừng không liên quan nhưng mời bạn khám phá điều thú vị này qua lăng kính "Thật Chất" của The Pizza Company nhé!
                    Hát bội - Một loại hình nghệ thuật được du nhập, cải biên và trở thành di sản văn hoá phi vật thể trong đời sống tinh thần của người Việt Nam từ nhiều thế hệ trước.
                   
                    
                    - Thời gian áp dụng: Từ 19/09/2022 đến khi có thông báo mới
                    
                    - Áp dụng cho dùng bữa tại chỗ, mua mang về, giao hàng tận nơi
                    
                    - Phụ thu phí giao hàng 25,000VND với đơn hàng từ 100.000VND trở lên khi đặt hàng qua Hotline 19006066 hoặc Website www.thepizzacompany.vn </p>
            
          </div>
          <div class="lg:max-w-lg  md:w-1/2 w-5/6">
            <img class="object-cover object-center rounded p-4 border-2 border-gray-200 rounded-lg" alt="hero" src="/image/banner.png">
          </div>
        </div>
      </section>
    


    

      @include('Component.Footer')

    
</body>
</html>