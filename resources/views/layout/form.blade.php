<div class="form-group">
<label for="imagePath">Image path</label>
<input name="imagePath" type="text" class="form-control" id="imagePath" aria-describedby="imagePathHelp" placeholder="Image path" value="{{ old('imagePath') ?? $product->imagePath }}">
<small id="emailHelp" class="form-text text-muted">Please enter the product's image path</small>
@error('imagePath') <p style="color: red;">{{ $message }}</p>@enderror
<div class="form-group">
<label for="name">Product name</label>
<input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Product name" value="{{ old('name') ?? $product->name }}">
<small id="emailHelp" class="form-text text-muted">Please enter the product's name</small>
@error('name') <p style="color: red;">{{ $message }}</p>@enderror
</div>
<div class="form-group">
<label for="price">Product price</label>
<input name="price" type="number" step="0.01" min="0" class="form-control" id="price" aria-describedby="priceHelp" placeholder="Product price" value="{{ old('price') ?? $product->price }}">
<small id="emailHelp" class="form-text text-muted">Please enter the product's price</small>
@error('price') <p style="color: red;">{{ $message }}</p>@enderror
</div>