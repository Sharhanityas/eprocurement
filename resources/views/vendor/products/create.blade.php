<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    
    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
        <label>Price:</label>
        <input type="text" name="price" required>
        <br>
        <label>Image:</label>
        <input type="file" name="image">
        <br>
        <button type="submit">Create</button>
    </form>
    
    <a href="{{ route('vendor.products.index') }}">Back to Products</a>
</body>
</html>
