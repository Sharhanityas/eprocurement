<!-- resources/views/vendor/register.blade.php -->
<form action="{{ route('vendor.register') }}" method="POST">
    @csrf
    <label for="company_name">Company Name:</label>
    <input type="text" name="company_name" id="company_name">
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <button type="submit">Register</button>
</form>
