<!-- resources/views/products/filtered.blade.php -->
<h2>Filtered Products</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Brand</th>
            <!-- Thêm các trường sản phẩm khác -->
        </tr>
    </thead>
    <tbody>
        @foreach($filteredProducts as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->brand }}</td>
                <!-- Hiển thị các giá trị khác -->
            </tr>
        @endforeach
    </tbody>
</table>
