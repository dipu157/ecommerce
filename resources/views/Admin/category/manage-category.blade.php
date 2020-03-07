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
							<th>Category Name</th>
							<th>Category Description</th>
							<th>Publication Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@php( $i = 1)
						@foreach($categories as $category)
						<tr>
							<td>{{$i++}}</td>
							<td>{{ $category->category_name }}</td>
							<td>{{ $category->category_description }}</td>
							<td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
							<td>
								@if( $category->status == 1 )
								<a href="{{ route('unpublished-category', ['id' => $category->id]) }}" class="btn btn-primary">Published</a>
								@else
								<a href="{{ route('published-category', ['id' => $category->id]) }}" class="btn btn-warning">Unpublished</a>
								@endif
								<a href="{{ route('edit-category-index', ['id' => $category->id]) }}" class="btn btn-success">Edit</a>
								<a href="{{ route('delete-category', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
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