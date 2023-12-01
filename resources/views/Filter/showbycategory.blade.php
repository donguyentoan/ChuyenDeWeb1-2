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
</head>

<style>
html {
    scroll-behavior: smooth;
}

.likeIcon.liked {
    color: #0566ff;
}
</style>

<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>
    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "155737337627217");
    chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <!-- Your SDK code -->
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v18.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    @include('component.Header')
    @include('component.Reviewmenu')
    @csrf


    <section class="text-gray-600 body-font">
        <div class="container pb-24 mx-auto">
            <dialog id="firstModal" class="p-10 border-2 border-gray-300 rounded-xl w-11/12 h-4/5 mx-auto relative">
                <!-- Modal content -->
            </dialog>
            <section class="text-gray-600 body-font">
                <div class="container pb-24  mx-auto">
                    <div class="mb-6">
                        <div class="flex flex-wrap ">
                            @foreach($category->products as $product)
                            <div
                                class="mt-10 md:w-1/4 w-full md:p-3 md:border-0 md:py-0 md: my-0 py-3 my-4 border-b-[1px] border-gray-300">
                                <div
                                    class="h-full border-gray-200 md:flex-col flex border-opacity-60 rounded-lg overflow-hidden">
                                    <div class="w-2/5 md:w-full md:p-0 ">
                                        <img class="hover:rotate-[10deg] transition duration-450 ease-out hover:ease-in w-80 h-80 object-contain z-0"
                                            src="/upload/{{$product->image}}" alt="blog">
                                    </div>
                                    <div class="w-3/5 md:w-full md:px-0 md:px-0 px-2 z-50">
                                        <h1 class="title-font text-lg font-bold text-gray-900 mb-3">
                                            {{$product->name}}
                                        </h1>
                                        <p class="leading-relaxed text-xs mb-3 my-5 line-clamp-1">
                                            {{$product->description}}</p>
                                        <div class=" items-center flex justify-between items-end">
                                            <p class="text-sm">Giá Chỉ Từ <br> <span
                                                    class="md:text-xl text-base text-black font-extrabold">{{$product->price}}đ</span>
                                            </p>
                                            <div>
                                                <!-- Thích sản phẩm -->
                                                <button class="like-button" data-product-id="{{ $product->id }}">
                                                    <i class="fa-solid fa-thumbs-up likeIcon"></i>
                                                </button>
                                                <!-- Hiển thị số lượng like của sản phẩm -->
                                                <span id="likeCount{{ $product->id }}">
                                                    {{ $product->like_count ?? 0 }}
                                                </span>
                                            </div>
                                            <div
                                                class="flex items-center border-green-500 border-[1px] md:px-2 px-2 py-1 mr-1  rounded-lg text-green-500">
                                                <input
                                                    onclick="showModal('{{ $product->name }}', {{ $product->price }} , {{ $product->id }} , '{{ $product->image }}' )"
                                                    type="button" value="Mua Ngay"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    fill="currentColor" class="bi bi-arrow-right md:ml-2 ml-1 "
                                                    viewBox="0 0 16 16">
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
                    </div>

                </div>
            </section>
            <script>
            //likeProduct------------------------------------------------------------




            document.addEventListener('DOMContentLoaded', function() {
                // Lặp qua tất cả các nút thích
                document.querySelectorAll('.like-button').forEach(function(button) {
                    var productId = button.getAttribute('data-product-id');




                    // Gọi hàm để kiểm tra trạng thái like và cập nhật giao diện
                    checkLikeStatus(productId);




                    // Lắng nghe sự kiện click trên nút thích
                    button.addEventListener('click', function() {
                        toggleLike(productId);
                    });
                });




                // Hàm kiểm tra trạng thái like và cập nhật giao diện
                function checkLikeStatus(productId) {
                    fetch('/check-like/' + productId)
                        .then(response => response.json())
                        .then(data => {
                            updateLikeButton(productId, data.isLiked);
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                        });
                }




                // Hàm thực hiện thêm hoặc xóa like
                function toggleLike(productId) {
                    fetch('/like/' + productId, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Cập nhật số lượng like trên giao diện
                            var likeCountElement = document.getElementById('likeCount' + productId);
                            likeCountElement.textContent = data.like;




                            // Cập nhật trạng thái like trên nút thích
                            updateLikeButton(productId, data.isLiked);
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                        });
                }




                // Hàm cập nhật trạng thái like trên nút thích
                function updateLikeButton(productId, isLiked) {
                    var likeButton = document.querySelector('.like-button[data-product-id="' + productId +
                        '"] .likeIcon');
                    likeButton.classList.toggle('liked', isLiked);
                }
            });












            // ----------------------------------------------------------------------------------------




            updateMiniCart();
            let basePrice = 0; // Biến toàn cục để lưu giá ban đầu




            // const basePrice = parseFloat(document.getElementById('modal-product-price-hidden').value);
            let totalPrice = basePrice;








            function showModal(productName, productPrice, productId, productImage) {
                // Cập nhật thông tin sản phẩm trong modal
                document.getElementById('modal-product-name').textContent = productName;
                document.getElementById('modal-product-id').textContent = productId;
                document.getElementById('modal-product-Image').src = "/upload/" +
                    productImage;












                // Cập nhật giá ban đầu cho sản phẩm mới
                basePrice = productPrice;




                // Hiển thị giá ban đầu trên modal
                const formattedInitialBasePrice = basePrice.toFixed(0).replace(
                    /\d(?=(\d{3})+$)/g, '$&,');
                document.getElementById('modal-product-price').textContent =
                    `${formattedInitialBasePrice}đ`;




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
                const selectedSize = document.querySelector(
                    'input[name="size"]:checked');
                const sizePrice = selectedSize ? parseFloat(selectedSize.getAttribute(
                    'data-price')) : 0;
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
                        toppingPrice += parseFloat(checkbox.getAttribute(
                            'data-topping'));
                    }
                });
                return toppingPrice;
            }








            function addToMiniCart() {
                // Lấy thông tin sản phẩm từ các phần tử HTML
                const productName = document.getElementById('modal-product-name-hidden')
                    .value;
                const productImage = document.getElementById(
                    'modal-product-image-hidden').value;
                const productPrice = totalPrice; // Lấy tổng giá
                const productId = document.getElementById('modal-product-id-hidden')
                    .value;
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
                const existingProductIndex = miniCart.findIndex(item => item.id ===
                    productId);
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
            </script>








        </div>
    </section>




    @include('component.Footer')




</body>




</html>