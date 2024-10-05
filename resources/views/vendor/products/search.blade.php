<!-- resources/views/products/search.blade.php -->
<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="query" placeholder="Search for products...">
    <button type="submit">Search</button>
</form>

@if($products->isNotEmpty())
    @foreach($products as $product)
        <div>{{ $product->name }} - ${{ $product->price }}</div>
    @endforeach
@else
    <p>No products found.</p>
@endif
