<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    
    <form action="{{ route('vendor.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <br>
        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
        <br>
        <label>Price:</label>
        <input type="text" name="price" value="{{ $product->price }}" required>
        <br>
        <label>Image:</label>
        <input type="file" name="image">
        <br>
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
        @endif
        <br>
        <button type="submit">Update</button>
    </form>
    
    <a href="{{ route('vendor.products.index') }}">Back to Products</a>
</body>
</html>
