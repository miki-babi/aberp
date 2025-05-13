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
        <h2 class="text-2xl font-bold mb-4">Add New Category</h2>
        <form method="POST" action="{{ route('category.store') }}">
          @csrf
      
          <!-- Name -->
          <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Category Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
          </div>
      
      
          
           <!-- Description -->
           <div class="mb-4">
            <label for="description" class="block font-semibold mb-1">Category Description</label>
            <input type="text" name="description" id="description" class="w-full p-2 border rounded">
          </div>
          <!-- Save Button -->
          <div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
              Save Category
            </button>
          </div>
        </form>
      </div>
      
</body>
</html>
