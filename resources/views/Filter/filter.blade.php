<!DOCTYPE html>
<html>
<head>
    <title>Product Filter</title>
</head>
<body>
    <h1>All Products</h1>
    <!-- Hiển thị danh sách sản phẩm -->

    <h2>Filter:</h2>
    <form id="filterForm">
        {{ csrf_field() }}
        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="">All</option>
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category->name }}</option>
            @endforeach
        </select>

     
        <button type="button" id="filterButton">Filter</button>
    </form>

    <div id="filteredProducts">
        <!-- Hiển thị sản phẩm đã lọc ở đây -->
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#filterButton').click(function () {
                var category = $('#category').val();
                var brand = $('#brand').val();

                $.ajax({
                    type: 'POST',
                    url: '/products/filter',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        category: category,
                        brand: brand
                    },
                    success: function (data) {
                        $('#filteredProducts').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
