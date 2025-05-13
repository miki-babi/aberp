<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    @vite(['resources/css/app.css','resources/js/app.js']) <!-- Import Tailwind CSS -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
        <div >
          <a href="{{ route('category.create') }}" class="text-white font-bold w-2/3 text-sm bg-sky-300 text-black p-2 rounded hover:bg-sky-400">
            add new category
          </a>
        </div>
      
        <form method="POST" action="/products">
          @csrf
      
          <!-- Name -->
          <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
          </div>
      
          <!-- Category -->
          <div class="mb-4">
            <label for="category" class="block font-semibold mb-1">Category</label>
            <select name="category" id="category" class="w-full p-2 border rounded" required>
              <option value="">Select Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
          </div>
      
          <!-- Brand -->
          <div class="mb-4">
            <label for="brand" class="block font-semibold mb-1">Brand</label>
            <input type="text" name="brand" id="brand" class="w-full p-2 border rounded" required>
          </div>
      
          <!-- Model -->
          <div class="mb-4">
            <label for="model" class="block font-semibold mb-1">Model</label>
            <input type="text" name="model" id="model" class="w-full p-2 border rounded" required>
          </div>
      
          <!-- Spec (e.g. Size/Volume) -->
          <div class="mb-4">
            <label for="spec" class="block font-semibold mb-1">Spec (e.g. Size / Volume)</label>
            <input type="text" name="attributes[size]" id="spec" class="w-full p-2 border rounded">
          </div>
      
          {{-- <!-- Stock -->
          <div class="mb-4">
            <label for="stock_quantity" class="block font-semibold mb-1">Stock Quantity</label>
            <input type="number" name="stock_quantity" id="stock_quantity" class="w-full p-2 border rounded" required>
          </div> --}}
      
          <!-- Price -->
          <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Sale Price</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full p-2 border rounded" required>
          </div>
      
          <!-- Save Button -->
          <div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
              Save Product
            </button>
          </div>
        </form>
      </div>
      
</body>
</html>
