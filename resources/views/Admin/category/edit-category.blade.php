@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-12">
		<h3 class="text-success text-center">{{ Session::get('msg') }}</h3>

		<form method="POST" class="form-group" action="{{ route('update-category') }}">
			@csrf
			<div class="card card-body">
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" />
				<input type="hidden" name="id" value="{{ $category->id }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Category Description</label>
				<textarea name="category_description" class="form-control">{{ $category->category_description }} </textarea>
			</div>


			<div class="form-group">
				<input type="radio" name="status" {{ $category->status == 1 ? 'checked' : '' }} checked value="1" /> Published
				<input type="radio" name="status" {{ $category->status == 0 ? 'checked' : '' }}  value="0" /> UnPublished
			</div>


			<div class="form-group">
				<input type="submit" name="btn" class="btn btn-success btn-block" />
			</div>
		</div>
		</form>
	</div>
</div>

@endsection