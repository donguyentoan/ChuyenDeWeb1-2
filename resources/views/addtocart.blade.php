<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <!-- Thêm mã HTML cho mini cart -->
<div class="minicart bg-white p-4 w-72 mx-auto mt-1 rounded-lg shadow-lg" id="mini-cart">
    <div class="minicart--item-container text-xs font-semibold mb-2">
        You have <span class="minicart--item-count font-bold">0 items</span> in your cart!
    </div>
    <hr class="mb-4">
    <ul id="cart-items">
        <!-- Các mặt hàng trong giỏ hàng sẽ được hiển thị ở đây -->
    </ul>
    <hr class="my-4">
    <div class="minicart--subtotal">
        <p class="minicart--subtotal-title float-left">Subtotal</p>
        <p class="minicart--subtotal-amount float-right font-bold text-lg">$0.00 USD</p>
    </div>
    <input type="button" value="View Cart Details" class="w-full h-10 font-semibold bg-black text-white border-none cursor-pointer hover:bg-gray-800">
</div>

    <script>
        // JavaScript để xử lý việc thêm và cập nhật sản phẩm trong giỏ hàng
document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    const miniCart = document.getElementById("mini-cart");
    const cartItemsList = document.getElementById("cart-items");
    const cartTotalElement = document.getElementById("cart-total");
    const cartItemCountElement = document.querySelector(".minicart--item-count");

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
            listItem.className = "minicart--item flex mb-5";
            listItem.innerHTML = `
                <div class="placeholder w-20 h-26 mr-4 bg-gray-300"></div>
                <div class="content flex-1">
                    <h1 class="text-sm font-bold mb-2">${item.name}</h1>
                    <p class="text-sm"><span class="font-bold text-sm">Giá :</span> $${item.price.toFixed(2)}  <span> ${item.quantity}x</span></p>
                    <p class="text-sm"><span class="font-bold text-sm">size :</span>  Nhỏ</p>
                    <p class="text-sm"><span class="font-bold text-sm">Đế  :</span>   dày</p>
                    <a class="text-xs text-red-500 hover:underline flex" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                        <p class="ml-2">  Remove from cart</p>
                    </a>
                </div>
            `;

            cartItemsList.appendChild(listItem);

            cartTotal += item.price * item.quantity;
        });

        cartTotalElement.textContent = `$${cartTotal.toFixed(2)}`;
        cartItemCountElement.textContent = cart.length;
        miniCart.style.display = "block";
                }

                // Cập nhật hiển thị ban đầu của giỏ hàng
                updateCartDisplay();
            });

    </script>
</body>
</html>
