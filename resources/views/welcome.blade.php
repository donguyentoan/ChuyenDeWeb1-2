<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>
    <div class="slider">
        <div class="list relative">
            <div class="item active">
                <img src="./image/h1.png" alt="">
            </div>
            <div class="item">
            <img src="./image/h1.png" alt="">
            </div>
            <div class="item">
            <img src="./image/h1.png" alt="">
            </div>
            <div class="item">
            <img src="./image/h1.png" alt="">
            </div>
            <div class="item">
            <img src="./image/h1.png" alt="">
            </div>
        </div>
        <!-- Button prev and next -->
        <div class="buttons absolute top-1/2 left-5 w-90 flex justify-between">
            <button id="prev" class="w-12 h-12 rounded-full bg-black bg-opacity-50 text-white font-bold"> &lt; </button>
            <button id="next" class="w-12 h-12 rounded-full bg-black bg-opacity-50 text-white font-bold"> &gt; </button>
        </div>
        <!-- Dots -->
        <ul class="dots absolute bottom-2 left-0 w-full m-0 p-0 flex justify-center">
            <li class="active w-10 h-10 rounded-full bg-white bg-opacity-50 mx-2"></li>
            <li class="w-10 h-10 rounded-full bg-white bg-opacity-50 mx-2"></li>
            <li class="w-10 h-10 rounded-full bg-white bg-opacity-50 mx-2"></li>
            <li class="w-10 h-10 rounded-full bg-white bg-opacity-50 mx-2"></li>
            <li class="w-10 h-10 rounded-full bg-white bg-opacity-50 mx-2"></li>
        </ul>
    </div>
</body>
<script>
    let list = document.querySelector('.slider .list');
    let items = document.querySelectorAll('.slider .list .item');
    let dots = document.querySelectorAll('.slider .dots li');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    let active = 0;
    let lengthItems = items.length - 1;

    next.onclick = function() {
        if (active + 1 > lengthItems) {
            active = 0;
        } else {
            active = active + 1;
        }
        reloadSlider();
    }

    prev.onclick = function() {
        if (active - 1 < 0) {
            active = lengthItems;
        } else {
            active = active - 1;
        }
        reloadSlider();
    }

    let refreshSlider = setInterval(() => { next.click() }, 3000);

    function reloadSlider() {
        let checkLeft = items[active].offsetLeft;
        list.style.left = -checkLeft + 'px';

        let lastActiveDot = document.querySelector('.slider .dots li.active');
        lastActiveDot.classList.remove('active');
        dots[active].classList.add('active');

        // Thêm class 'active' cho item được active và xóa class 'active' ở các item còn lại
        items.forEach((item, index) => {
            if (index === active) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });

        clearInterval(refreshSlider);
        refreshSlider = setInterval(() => { next.click() }, 3000);
    }
    dots.forEach((li, key) => {
        li.addEventListener('click', function() {
            active = key;
            reloadSlider();
        })
    })
</script>
</html>
