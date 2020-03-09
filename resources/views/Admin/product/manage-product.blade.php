@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-12">
		<div class="card card-body rounded-0">
			<h3 class="text-success text-center">{{ Session::get('message') }}</h3>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Product Name</th>
							<th>product Name</th>
							<th>Brand Name</th>
							<th>Product Price</th>
							<th>Product Stock</th>
							<th>Product Image</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@php( $i = 1)
						@foreach($products as $product)
						<tr>
							<td>{{$i++}}</td>
							<td>{{ $product->product_name }}</td>
							<td>{{ $product->category->category_name }}</td>
							<td>{{ $product->brand->brand_name }}</td>
							<td>{{ $product->product_price }}</td>
							<td>{{ $product->product_stock }}</td>
							<td><img src="{{ asset($product->product_image) }}" alt="" width="120px" height="80px"> </td>
							<td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
							<td>
								@if( $product->status == 1 )
								<a href="{{ route('unpublished-product', ['id' => $product->id]) }}" class="btn btn-primary">Published</a>
								@else
								<a href="{{ route('published-product', ['id' => $product->id]) }}" class="btn btn-warning">Unpublished</a>
								@endif
								<a href="{{ route('edit-product-index', ['id' => $product->id]) }}" class="btn btn-success">Edit</a>
								<a href="{{ route('delete-product', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

@endsection