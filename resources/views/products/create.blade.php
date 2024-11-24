<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">name:</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="">description:</label>
            <input type="text" name="description">
        </div>
        <div class="form-group">
            <label for="">price:</label>
            <input type="number" name="price">
        </div>
        <div class="form-group">
            <label for="">sale_price:</label>
            <input type="number" name="sale_price">
        </div>
        <div class="form-group">
            <label for="">image:</label>
            <input type="file" name="image">
        </div>
        <!-- Add other product fields here -->
        <button type="submit" class="btn btn-primary">Save Product</button>
    </form>

</body>
</html>

