@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-10 mx-auto mt-2">
		<div class="card">
			<div class="card-header text-primary">Product Info</div>
			<form method="POST" class="form-group" action="{{ route('update-product') }}" enctype="multipart/form-data" name="editProductform">
		@csrf
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product Code</label>
				<input type="text" name="product_code" value="{{ $product->product_code }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Category Name</label>
				<select class="form-control" name="category_id" required="">
				<option selected>-- Select Category Name--</option>
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->category_name }}</option>
				@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Brand Name</label>
				<select class="form-control" name="brand_id" required="">
				<option selected>-- Select Brand Name--</option>
				@foreach($brands as $brand)
				<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
				@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Product Price</label>
				<input type="number" step="any" name="product_price" value="{{ $product->product_price }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product Stock Amount</label>
				<input type="number" name="product_stock" value="{{ $product->product_stock }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product SKU</label>
				<input type="number" name="product_sku" value="{{ $product->product_sku }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"> {{ $product->description }}</textarea>
			</div>

			<div class="form-group">
				<label>Product Image</label>
				<input type="file" name="product_image" class="form-control-file" />
				<img src="{{ asset($product->product_image) }}" alt="" height="100" width="150" />
			</div>

			<div class="form-group">
				<label>Sub Image</label>
				<input type="file" name="sub_image[]" class="form-control-file" />
				@foreach($subImages as $subImage)
				<img src="{{ asset($subImage->sub_image) }}" alt="" height="100" width="150" />
				@endforeach
			</div>


			<div class="form-group">
				<input type="radio" name="status" {{ $product->status == 1 ? 'checked' : '' }} checked value="1" /> Published
				<input type="radio" name="status" {{ $product->status == 0 ? 'checked' : '' }} value="0" /> UnPublished
			</div>


			<div class="form-group">
				<input type="submit" value="Save Product" name="btn" class="btn btn-success btn-block" />
			</div>
				
		</form>	
		</div>					
	</div>	
</div>

<script>
document.forms['editProductform'].elements['category_id'].value = '{{ $product->category_id }}';
document.forms['editProductform'].elements['brand_id'].value = '{{ $product->brand_id }}';
</script>

@endsection