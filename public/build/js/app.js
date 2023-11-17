//load file ảnh
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};

//tự động tạo slug
document.addEventListener("DOMContentLoaded", function() {
    // Hiển thị thông báo
    var successMessage = document.getElementById("success-message");
    successMessage.style.display = "block";

    // Ẩn thông báo sau 5 giây
    setTimeout(function() {
        successMessage.style.display = "none";
    }, 3000);
});

// script.js
const toppingCheckboxes = document.querySelectorAll('.topping');
const totalPriceElement = document.getElementById('total-price');
const totalPricehidden = document.getElementsByClassName('price_hidden').value;


const basePrice = parseFloat(totalPricehidden); // Giá gốc của sản phẩm

let totalPrice = basePrice;

toppingCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const toppingPrice = parseFloat(this.value);
        if (this.checked) {
            totalPrice += toppingPrice;
        } else {
            totalPrice -= toppingPrice;
        }
        totalPriceElement.textContent = `${totalPrice.toFixed(3)}đ`;
    });
});

const sizeRadios = document.querySelectorAll('.size');
let selectedSize = 'small'; // Kích thước mặc định

sizeRadios.forEach(radio => {
    radio.addEventListener('change', function () {
        selectedSize = this.value;
        updateTotalPrice();
    });
});

function updateTotalPrice() {
    const sizePrice = parseFloat(document.querySelector(`input[name="size"]:checked`).getAttribute('data-price'));
    const toppingPrice = calculateToppingPrice();
    totalPrice = basePrice + sizePrice + toppingPrice;
    totalPriceElement.textContent = `${totalPrice.toFixed(3)}đ`;
}

function calculateToppingPrice() {
    let toppingPrice = 0;
    toppingCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            toppingPrice += parseFloat(checkbox.value);
        }
    });
    return toppingPrice;
}

// Cập nhật tổng tiền khi trang web được tải
updateTotalPrice();






   