@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-10 mx-auto mt-2">
		<div class="card">
			<div class="card-header text-primary">Product Info</div>
		<h3 class="text-success text-center">{{ Session::get('msg') }}</h3>
			<form method="POST" class="form-group" action="{{ route('save-product') }}" enctype="multipart/form-data">
		@csrf
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" name="product_name" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product Code</label>
				<input type="text" name="product_code" class="form-control" />
			</div>

			<div class="form-group">
				<label>Category Name</label>
				<select class="form-control" name="category_id" required="">
				<option disabled selected>-- Select Category Name --</option>
				@foreach($categories as $category)
				<option value="{{ $category->id }}">{{ $category->category_name }}</option>
				@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Brand Name</label>
				<select class="form-control" name="brand_id" required="">
				<option disabled selected>-- Select Brand Name --</option>
				@foreach($brands as $brand)
				<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
				@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Product Price</label>
				<input type="number" step="any" name="product_price" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product Stock Amount</label>
				<input type="number" name="product_stock" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product SKU</label>
				<input type="number" name="product_sku" class="form-control" />
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"> </textarea>
			</div>

			<div class="form-group">
				<label>Product Main Image</label>
				<input type="file" name="product_image" class="form-control" />
			</div>

			<div class="form-group">
				<label>Product Sub Image</label>
				<input type="file" name="sub_image[]" multiple class="form-control" />
			</div>


			<div class="form-group">
				<input type="radio" name="status" checked value="1" /> Published
				<input type="radio" name="status" value="0" /> UnPublished
			</div>


			<div class="form-group">
				<input type="submit" value="Save Product" name="btn" class="btn btn-success btn-block" />
			</div>
				
		</form>	
		</div>					
	</div>	
</div>

@endsection