<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Phần CSS cho mini cart */
        .minicart {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 288px;
            height: auto;
            padding: 20px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0px 30px 130px -8px rgba(0, 0, 0, 0.25);
        }

        /* Phần CSS cho .product */
        .product {
            margin-bottom: 20px;
        }

        /* Hiển thị mini cart khi người dùng nhấp vào sản phẩm */
        .product button.add-to-cart-btn {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Sản phẩm</h1>
    <div class="product">
        <p>Sản phẩm 1 - $10</p>
        <button class="add-to-cart-btn" data-product-name="Sản phẩm 1" data-product-price="10">Thêm vào giỏ hàng</button>
    </div>

    <div class="product">
        <p>Sản phẩm 2 - $15</p>
        <button class="add-to-cart-btn" data-product-name="Sản phẩm 2" data-product-price="15">Thêm vào giỏ hàng</button>
    </div>
    <div class="product">
        <p>Sản phẩm 3 - $15</p>
        <button class="add-to-cart-btn" data-product-name="Sản phẩm 3" data-product-price="15">Thêm vào giỏ hàng</button>
    </div>

    <!-- Hiển thị mini cart -->
    <div class="minicart" id="mini-cart">
        <div class="minicart--item-container">
            You have <span class="minicart--item-count">0</span> items in your cart!
        </div>
        <hr>
        <ul id="cart-items">
            <!-- Các mặt hàng trong giỏ hàng sẽ được hiển thị ở đây -->
        </ul>
        <p>Total: $<span id="cart-total">0.00</span></p>
    </div>

    <script>
        // JavaScript để xử lý việc thêm và cập nhật sản phẩm trong giỏ hàng
        document.addEventListener("DOMContentLoaded", function() {
            const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
            const miniCart = document.getElementById("mini-cart");
            const cartItemsList = document.getElementById("cart-items");
            const cartTotalElement = document.getElementById("cart-total");

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            addToCartButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const productName = button.getAttribute("data-product-name");
                    const productPrice = parseFloat(button.getAttribute("data-product-price"));

                    addItemToCart(productName, productPrice);
                });
            });

            function addItemToCart(productName, productPrice) {
                const existingItem = cart.find(item => item.name === productName);

                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    const newItem = {
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    };
                    cart.push(newItem);
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartDisplay();
            }

            function updateCartDisplay() {
                cartItemsList.innerHTML = "";
                let cartTotal = 0;

                cart.forEach(item => {
                    const listItem = document.createElement("li");
              
                    listt = ` <li class="minicart--item flex mb-5 mt-5">
                <div class="placeholder w-20 h-26 mr-4 bg-gray-300"></div>
                <div class="content flex-1">
                    <h1 class="text-sm font-bold mb-2"> ${item.name}</h1>
                    <p class="text-sm"><span class="font-bold text-sm">Giá :</span>  190.000đ  <span> x${item.quantity}</span></p>
                    <p class="text-sm"><span class="font-bold text-sm">size :</span>  Nhỏ</p>
                    <p class="text-sm"><span class="font-bold text-sm">Đế  :</span>   dày</p>
                    <a class="text-xs text-red-500 hover:underline flex" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                    <p class="ml-2">  Remove from cart</p>
                    
                    </a>
                </div>
                </li>
                `;

                    //  listItem.textContent = ` ${item.name} `;
                    // listItem.textContent = `${item.name} x${item.quantity} - $${(item.price * item.quantity).toFixed(2)}`;
                    // cartItemsList.appendChild(listItem);
                       cartItemsList.innerHTML += listt;

                    cartTotal += item.price * item.quantity;
                });

                cartTotalElement.textContent = cartTotal.toFixed(2);
                document.querySelector(".minicart--item-count").textContent = cart.length;
                miniCart.style.display = "block";
            }

            // Cập nhật hiển thị ban đầu của giỏ hàng
            updateCartDisplay();
        });
    </script>
</body>
</html>
