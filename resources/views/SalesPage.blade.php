<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite('resources/css/app.css') <!-- Import Tailwind CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-2xl mx-auto p-4 space-y-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold">Make a Sale</h2>
      
        <!-- Step 1: Category -->
        <div class="mb-4 " >
          <label for="category" class="block font-medium">Category</label>
          <select id="category" name="category" class=" w-full mt-1 p-2 border rounded"> 
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      
        <!-- Step 2: Brand -->
        <div>
          <label for="brand" class="block font-medium">Brand</label>
          <select id="brand" name="brand" class="w-full mt-1 p-2 border rounded">
            <option value="">Select Brand</option>
            <!-- Dynamically filled -->
          </select>
        </div>
      
        <!-- Step 3: Spec (Model, Size, Volume) -->
        <div>
          <label for="spec" class="block font-medium">Model / Size / Volume</label>
          <select id="spec" name="spec" class="w-full mt-1 p-2 border rounded">
            <option value="">Select Spec</option>
            <!-- Dynamically filled -->
          </select>
        </div>
      
        <!-- Step 4: Quantity and Sale Price -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="quantity" class="block font-medium">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="w-full mt-1 p-2 border rounded" min="1" value="1" />
          </div>
          <div>
            <label for="price" class="block font-medium">Sale Price</label>
            <input type="number" id="price" name="price" class="w-full mt-1 p-2 border rounded" min="0" step="0.01" />
          </div>
        </div>
      
        <!-- Step 5: Add to Sale -->
        <button class="w-full mt-4 bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
          Add to Sale
        </button>
      
        <!-- Final Step: Confirm Sale -->
        <button class="w-full mt-2 bg-green-600 text-white p-2 rounded hover:bg-green-700">
          Confirm Sale
        </button>
      </div>
      <script>
        $(document).ready(function () {
            // Replace ':category' with actual selected category in the route
            let fetchBrandsUrl = "{{ route('get.brands.by.category', ':category') }}";
            let fetchSpecsUrl = "{{ route('get.specs.by.brand', ':brand') }}";
    
            $('#category').change(function () {
                let category = $(this).val();
                $('#brand').empty().append('<option value="">Select Brand</option>');
                $('#spec').empty().append('<option value="">Select Spec</option>');
    
                if (category) {
                    let url = fetchBrandsUrl.replace(':category', category);
                    $.get(url, function (brands) {
                        brands.forEach(function (brand) {
                            $('#brand').append('<option value="' + brand.id + '">' + brand.name + '</option>');
                        });
                    });
                }
            });
    
            $('#brand').change(function () {
                let brandId = $(this).val();
                $('#spec').empty().append('<option value="">Select Spec</option>');
    
                if (brandId) {
                    let url = fetchSpecsUrl.replace(':brand', brandId);
                    $.get(url, function (specs) {
                        specs.forEach(function (spec) {
                            $('#spec').append('<option value="' + spec.id + '">' + spec.name + '</option>');
                        });
                    });
                }
            });
        });
    </script>
    
      
</body>
</html>
