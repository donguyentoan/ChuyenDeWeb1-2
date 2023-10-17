 <section class="text-gray-600 body-font">


    <div class="container py-24 mx-auto">
      <dialog id="firstModal" class="p-10 border-2 border-gray-300 rounded-xl w-11/12 h-4/5 mx-auto relative">
        <div class="close absolute top-0 right-0 w-7 h-7 rounded-full flex justify-center align-center bg-red-500">
         <button onclick="firstModal.close()"> X</button>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div class=" w-full h-full rounded-md"> 
            <img class="w-10/12" src="./pizza.png" alt="">
             <div>
            <p class="text-2xl font-bold pr-20 text-center" id="total-price">190.000đ</p>
              <input type="hidden" value="190" id="price_hidden">
        </div>
            <p id="price" class="text-xl font-bold pr-20 text-center" > </p>
          </div>
         
          <div class="flex flex-col gap-4">
            <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Pizza Hải Sản</h1>
            <p class="text-[#007d43]">Kích thước nhỏ 6``</p>
            <p class="leading-relaxed text-base mb-3">Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island</p>
            <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Kích Thước</h1> 
            <div class="size">
              <label class="pr-3">
                <input type="radio" class="size " name="size" value="small" data-price="0"> Size nhỏ (+$0)
            </label>
            <label class="pr-3">
                <input type="radio" class="size" name="size" value="medium" data-price="2"> Size trung bình (+$2)
            </label>
            <label class="pr-3">
                <input type="radio" class="size" name="size" value="large" data-price="4"> Size lớn (+$4)
            </label>
            </div>
            <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Đế</h1> 
            <div class="toppng">
              <label class="pr-2">
                <input type="checkbox" class="topping" value="5"> Dày 
            </label>
            <label class="pr-2">
                <input type="checkbox" class="topping" value="10"> Mỏng giòn 
            </label> 
            <label class="pr-2">
              <input type="checkbox" class="topping" value="12"> Viền phô mai
          </label> 
            <label class="pr-2">
              <input type="checkbox" class="topping" value="15"> Viền phô mai xúc xích
          </label>
            </div>
           
            <div class="comment">
              <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Ghi Chú</h1> 
              <textarea class="border-2 border-gray-200" name="ghichu" id="" cols="55" rows="5">
              </textarea>
            </div>
           
            <button onclick="addItemToCart('Pizza Hải Sản', 190.000)"  class="bg-[#007d43] hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 w-full border border-gray-400 rounded-xl shadow">
              THÊM VÀO GIỎ HÀNG
            </button>
          </div>
        </div>
      </dialog>
      <div class="flex flex-wrap ">
        <div class="md:w-1/4 w-full md:p-3 md:border-0 md:py-0 md: my-0 py-3 my-4 border-b-[1px] border-gray-300 ">
          <div class="h-full border-gray-200 md:flex-col flex border-opacity-60 rounded-lg overflow-hidden">
            <div class="w-2/5 md:w-full md:p-0 ">
              <img class="object-cover object-center hover:rotate-[10deg] transition duration-450 ease-out hover:ease-in" src="./pizza.png" alt="blog">
            </div>
            <div class="w-3/5 md:w-full md:px-0 md:px-0 px-2">
              <h1 class="title-font text-lg font-bold text-gray-900 mb-3">Pizza Hải Sản</h1>
              <p class="leading-relaxed text-xs mb-3">Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island</p>
              <div class=" items-center flex justify-between ">
                <p class="text-sm">Giá Chỉ Từ <br > <span class="md:text-xl text-base text-black font-extrabold">230.000đ</span>  </p>
                  <div class="flex items-center border-green-500 border-[1px] md:px-2 px-2 py-1 mr-1  rounded-lg text-green-500">
                    <input onclick="firstModal.showModal()" type="button" value="Mua Ngay"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-arrow-right md:ml-2 ml-1 " viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                  </div>
              </div>
            </div>
          </div>
        </div>
      
      
       
       
      </div>
    </div>
  </section>