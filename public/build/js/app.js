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













   