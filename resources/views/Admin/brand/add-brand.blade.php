@extends('Admin.master')

@section('body-content')

<div class="row">
	<div class="col-md-12">
		<h3 class="text-success text-center">{{ Session::get('msg') }}</h3>

		<form method="POST" class="form-group" action="{{ route('save-brand') }}">
			@csrf
			<div class="card card-body">
			<div class="form-group">
				<label>Brand Name</label>
				<input type="text" name="brand_name" class="form-control" />
			</div>

			<div class="form-group">
				<label>Brand Description</label>
				<textarea name="brand_description" class="form-control"> </textarea>
			</div>


			<div class="form-group">
				<input type="radio" name="status" checked value="1" /> Published
				<input type="radio" name="status" value="0" /> UnPublished
			</div>


			<div class="form-group">
				<input type="submit" value="Save" name="btn" class="btn btn-success btn-block" />
			</div>
		</div>
		</form>
	</div>
</div>

@endsection