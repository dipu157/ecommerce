@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-12">
		<h3 class="text-success text-center">{{ Session::get('msg') }}</h3>

		<form method="POST" class="form-group" action="{{ route('update-brand') }}">
			@csrf
			<div class="card card-body">
			<div class="form-group">
				<label>Brand Name</label>
				<input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" />
				<input type="hidden" name="id" value="{{ $brand->id }}" class="form-control" />
			</div>

			<div class="form-group">
				<label>Brand Description</label>
				<textarea name="brand_description" class="form-control">{{ $brand->brand_description }} </textarea>
			</div>


			<div class="form-group">
				<input type="radio" name="status" {{ $brand->status == 1 ? 'checked' : '' }} checked value="1" /> Published
				<input type="radio" name="status" {{ $brand->status == 0 ? 'checked' : '' }}  value="0" /> UnPublished
			</div>


			<div class="form-group">
				<input type="submit" value="Update" name="btn" class="btn btn-success btn-block" />
			</div>
		</div>
		</form>
	</div>
</div>

@endsection