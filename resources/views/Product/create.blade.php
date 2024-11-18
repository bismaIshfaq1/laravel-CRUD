<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <div class="bg-dark py-3">
  <h3 class="text-white text-center">Laravel 11 CRUD</h3>
</div>

<!-- Create a spacer div to increase space between heading and form -->
<div class="container mt-5"><!-- Increased margin-top to 5 (Bootstrap's spacing utility) -->
<div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('product.index') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
 <form enctype="multipart/form-data" action="{{route('product.store')}}" method="post" class="d-flex justify-content-center align-items-center">
  @csrf
 <div class="bg-dark p-4 rounded shadow w-50">
      <h4 class="text-light text-center mb-4">Create Product</h4> <!-- Form title -->
      <div class="mb-3">
        <label for="nameInput" class="form-label text-light">Name</label>
        <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror bg-dark text-light border-secondary" id="nameInput" placeholder="Enter product name">
     @error('name')
     <p class="invalid-feedback">{{$message}}</p>

     @enderror
    </div>

      <div class="mb-3">
        <label for="skuInput" class="form-label text-light">SKU</label>
        <input value="{{old('sku')}}" name="sku" type="text" class="form-control bg-dark text-light @error('sku') is-invalid @enderror border-secondary" id="skuInput" placeholder="Enter product SKU">
        @error('sku')
     <p class="invalid-feedback">{{$message}}</p>

     @enderror
    </div>
      <div class="mb-3">
        <label for="priceInput" class="form-label text-light">Price</label>
        <input value="{{old('price')}}" name="price" type="text" class="@error('price') is-invalid @enderror form-control bg-dark text-light border-secondary" id="priceInput" placeholder="Enter product price">
        @error('price')
     <p class="invalid-feedback">{{$message}}</p>
     @enderror
    </div>
      <div class="mb-3">
        <label for="descriptionInput" class="form-label text-light">Description</label>
        <textarea name="description" class="form-control bg-dark text-light border-secondary" id="descriptionInput" rows="4" placeholder="Enter product description">{{old('description')}}</textarea>
      </div>
      <div class="mb-3">
        <label for="imageInput" class="form-label text-light">Image</label>
        <input type="file" name="image" class="form-control bg-dark text-light border-secondary" id="imageInput">
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </div>
  </form>
</div>
  </body>
</html>
