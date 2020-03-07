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
							<th>Brand Name</th>
							<th>Brand Description</th>
							<th>Publication Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@php( $i = 1)
						@foreach($brands as $brand)
						<tr>
							<td>{{$i++}}</td>
							<td>{{ $brand->brand_name }}</td>
							<td>{{ $brand->brand_description }}</td>
							<td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
							<td>
								@if( $brand->status == 1 )
								<a href="{{ route('unpublished-brand', ['id' => $brand->id]) }}" class="btn btn-primary">Published</a>
								@else
								<a href="{{ route('published-brand', ['id' => $brand->id]) }}" class="btn btn-warning">Unpublished</a>
								@endif
								<a href="{{ route('edit-brand-index', ['id' => $brand->id]) }}" class="btn btn-success">Edit</a>
								<a href="{{ route('delete-brand', ['id' => $brand->id]) }}" class="btn btn-danger">Delete</a>
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