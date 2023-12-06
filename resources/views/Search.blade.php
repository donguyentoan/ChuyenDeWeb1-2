<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    @include('component.Header')

    <dialog id="firstModal" class="p-10 border-2 border-gray-300 rounded-xl w-11/12 h-4/5 mx-auto relative">
        <div class="close absolute top-0 right-0 w-7 h-7 rounded-full flex justify-center align-center bg-red-500">
            <button onclick="firstModal.close()"> X</button>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <div class=" w-full h-full rounded-md">

                <img id="modal-product-Image" class="w-10/12" src="" alt="">
                <input type="hidden" value="190" id="modal-product-image-hidden">
                <div>
                    <!-- <p class="text-2xl font-bold pr-20 text-center" id="total-price">190.000đ</p> -->
                    <p class="text-2xl font-bold pr-20 text-center pt-20 " id="modal-product-price">1900</p>
                    <input type="hidden" value="190" id="modal-product-price-hidden">
                    <!-- <input id="price_hidden" type="hidden" value="1900" > -->
                </div>
                <p id="price" class="text-xl font-bold pr-20 text-center"> </p>
            </div>

            <div class="flex flex-col gap-4">
                <p id="modal-product-name" class="text-xl font-bold pr-20 ">Tên Sản Phẩm</p>
                <p class="hidden" id="modal-product-id"></p>
                <input type="hidden" value="Tên Sản Phẩm" id="modal-product-name-hidden">
                <input type="hidden" value="Tên Sản Phẩm" id="modal-product-id-hidden">
                <p class="text-[#007d43]">Kích thước nhỏ 6``</p>
                <p class="leading-relaxed text-base mb-3">Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island</p>
                <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Kích Thước </h1>
                <div class="size">
                    <label class="pr-3">
                        <input type="radio" class="size" name="size" value="small" data-price="0"> Size nhỏ (+$0)
                    </label>
                    <label class="pr-3">
                        <input type="radio" class="size" name="size" value="medium" data-price="100000"> Size trung bình
                        (+$2)
                    </label>
                    <label class="pr-3">
                        <input type="radio" class="size" name="size" value="large" data-price="200000"> Size lớn (+$4)
                    </label>
                </div>
                <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Đế</h1>
                <div class="toppng">
                    <label class="pr-2">
                        <input type="checkbox" class="topping mr-2" value="Dày" data-topping="100">Dày
                    </label>
                    <label class="pr-2">
                        <input type="checkbox" class="topping" value="Mỏng Giòn" data-topping="105"> Mỏng giòn
                    </label>
                    <label class="pr-2">
                        <input type="checkbox" class="topping" value="Viền Phô Mai" data-topping="110"> Viền phô mai
                    </label>
                    <label class="pr-2">
                        <input type="checkbox" class="topping" value="Viền Phô Mai Xúc Xích" data-topping="115"> Viền
                        phô mai xúc xích
                    </label>
                </div>

                <div class="comment">
                    <h1 class="title-font text-lg font-bold text-[#007d43] mb-3">Ghi Chú</h1>
                    <textarea class="border-2 border-gray-200" name="ghichu" id="" cols="55" rows="5">
          </textarea>
                </div>

                <!-- <button onclick="addItemToCart('Pizza Hải Sản', 190.000)"  class="bg-[#007d43] hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 w-full border border-gray-400 rounded-xl shadow"> -->

                <button onclick="addToMiniCart()"
                    class="text-center text-white add-to-cart-btn bg-[#007d43] font-semibold py-2 px-4 w-full border border-gray-400 rounded-xl shadow">
                    THÊM VÀO GIỎ HÀNG</button>
            </div>
            <div>
            </div>
    </dialog>


    <section class="text-gray-600 body-font flex">

        <div class="w-1/4 p-6 border-2  border-black-500  mr-2  rounded-r-xl ">
            <h3 class="text-xl font-bold border-b-2 border-black-500">Categories</h3>
            <form action="{{ route('filter') }}" method="get">
                <div class="list-group">
                    @foreach($manufacture as $ct)
                    <div class="list-group-item checkbox pt-3">
                        <label class="font-medium"><input name="manu[]" type="checkbox"
                                class="common_selector manu mr-2 w-3 " value="{{ $ct->id }}"> {{ $ct->name }} </label>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-end">
                    <input type="submit" class=" w-20  rounded-md mt-5 bg-blue-500 px-5 py-1" value="Filter">
                </div>

            </form>
        </div>
        <div class="w-full">
            <div class="flex flex-wrap ">
                @foreach($search as $key)
                <div
                    class="md:w-1/4 w-full md:p-3 md:border-0 md:py-0 md: my-0 py-3 my-4 border-b-[1px] border-gray-300 ">
                    <div class="h-full border-gray-200 md:flex-col flex border-opacity-60 rounded-lg overflow-hidden justify-end">
                        <div class="w-2/5 md:w-full md:p-0 ">
                            <img class="z-0 object-cover object-center hover:rotate-[10deg] transition duration-450 ease-out hover:ease-in"
                                src="./upload/{{$key->image}}" alt="blog">
                        </div>
                        <div class="w-3/5 md:w-full md:px-0 md:px-0 px-2 z-50">
                            <h1 class="title-font text-lg font-bold text-gray-900 mb-3">{{$key -> name}}</h1>
                            <p class="leading-relaxed text-xs mb-3">{{$key->description}}</p>
                            <div class=" items-center flex justify-between ">
                                <p class="text-sm">Giá Chỉ Từ <br> <span
                                        class="md:text-xl text-base text-black font-extrabold">{{$key->price}}đ</span>
                                </p>
                                <div
                                    class="flex items-center border-green-500 border-[1px] md:px-2 px-2 py-1 mr-1  rounded-lg text-green-500">
                                    <input
                                        onclick="showModal('{{ $key->name }}', {{ $key->price }} , {{ $key->id }} , '{{ $key->image }}' )"
                                        type="button" value="Mua Ngay"> <svg xmlns="http://www.w3.org/2000/svg"
                                        width="15" height="15" fill="currentColor"
                                        class="bi bi-arrow-right md:ml-2 ml-1 " viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="panigation p-8 ">

                {{ $search->appends(request()->input())->links() }}

            </div>


        </div>

        </div>
    </section>










    <script>
    updateMiniCart();
    let basePrice = 0; // Biến toàn cục để lưu giá ban đầu

    // const basePrice = parseFloat(document.getElementById('modal-product-price-hidden').value);
    let totalPrice = basePrice;


    function showModal(productName, productPrice, productId, productImage) {
        // Cập nhật thông tin sản phẩm trong modal
        document.getElementById('modal-product-name').textContent = productName;
        document.getElementById('modal-product-id').textContent = productId;
        document.getElementById('modal-product-Image').src = "/image/" + productImage;



        // Cập nhật giá ban đầu cho sản phẩm mới
        basePrice = productPrice;

        // Hiển thị giá ban đầu trên modal
        const formattedInitialBasePrice = basePrice.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
        document.getElementById('modal-product-price').textContent = `${formattedInitialBasePrice}đ`;

        // Lưu thông tin sản phẩm vào biến ẩn để sử dụng khi thêm vào giỏ hàng
        document.getElementById('modal-product-name-hidden').value = productName;
        document.getElementById('modal-product-price-hidden').value = basePrice;
        document.getElementById('modal-product-id-hidden').value = productId;
        document.getElementById('modal-product-image-hidden').value = productImage;

        // Mở modal
        firstModal.showModal();
    }

    // Lấy các phần tử HTML cần sử dụng
    const toppingCheckboxes = document.querySelectorAll('.topping');
    const sizeRadios = document.querySelectorAll('.size');
    const totalPriceElement = document.getElementById('modal-product-price');

    // Lắng nghe sự kiện khi có thay đổi kích thước hoặc topping
    sizeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            updateTotalPrice();
        });
    });

    toppingCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateTotalPrice();
        });
    });

    // JavaScript
    function updateTotalPrice() {
        const selectedSize = document.querySelector('input[name="size"]:checked');
        const sizePrice = selectedSize ? parseFloat(selectedSize.getAttribute('data-price')) : 0;
        const toppingPrice = calculateToppingPrice();
        totalPrice = basePrice + sizePrice + toppingPrice;

        // Sử dụng toFixed(2) để giới hạn số lẻ đến 2 chữ số thập phân
        let formattedNumber = totalPrice.toLocaleString('en-US', {
            style: 'decimal',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });

        // Cập nhật nội dung của totalPriceElement với định dạng số đã sửa
        totalPriceElement.textContent = `${formattedNumber}đ`;
    }



    function calculateToppingPrice() {
        let toppingPrice = 0;
        toppingCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                toppingPrice += parseFloat(checkbox.getAttribute('data-topping'));
            }
        });
        return toppingPrice;
    }


    function addToMiniCart() {
        // Lấy thông tin sản phẩm từ các phần tử HTML
        const productName = document.getElementById('modal-product-name-hidden').value;
        const productImage = document.getElementById('modal-product-image-hidden').value;
        const productPrice = totalPrice; // Lấy tổng giá
        const productId = document.getElementById('modal-product-id-hidden').value;
        const size = document.querySelector('input[name="size"]:checked').value;
        const crust = getSelectedToppings();
        const notes = document.querySelector('textarea[name="ghichu"]').value;

        // Tạo đối tượng sản phẩm
        const product = {
            id: productId,
            name: productName,
            image: productImage,
            price: productPrice, // Sử dụng giá tính toán từ các lựa chọn
            size: size,
            crust: crust,
            notes: notes,
            quantity: 1
        };

        // Thêm sản phẩm vào giỏ hàng (sử dụng local storage hoặc nơi bạn lưu trữ giỏ hàng)
        const miniCart = JSON.parse(localStorage.getItem('miniCartss')) || [];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        const existingProductIndex = miniCart.findIndex(item => item.id === productId);
        if (existingProductIndex !== -1) {
            // Nếu sản phẩm đã tồn tại, tăng quantity lên
            miniCart[existingProductIndex].quantity += 1;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
            miniCart.push(product);
        }

        localStorage.setItem('miniCartss', JSON.stringify(miniCart));

        // Cập nhật số lượng sản phẩm trong mini cart
        const itemCount = document.querySelector('.minicart--item-count');
        itemCount.textContent = miniCart.length;
        updateMiniCart();
        // Đóng modal sau khi thêm sản phẩm thành công
    }




    // Hàm lấy các topping đã chọn
    function getSelectedToppings() {
        const selectedToppings = [];
        toppingCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedToppings.push(checkbox.value);
            }
        });
        return selectedToppings;
    }





    // JavaScript
    </script>


    @include('Component.Footer')