@extends('admin.master')

@section('content')
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<form action="{{ route('articles.store') }}" method="post">
		{{ csrf_field() }}
		<label for="title">Title</label>
		<input type="text" name="title" id="title" placeholder="Title">
		<br>
		<label for="title">Body</label>
		<textarea type="text" name="body" id="body" placeholder="Body"></textarea>
		<br>
		<label for="tags">Tags</label>
		<select name="tags[]" id="tags" class="form-control" multiple>
			@foreach($tags as $tag)
			<option value="{{$tag}}">{{$tag}}</option>
			@endforeach
		</select>
		<button type="submit">Save</button>
	</form>
@endsection

@section('scripts')
	<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
	<script>
	    CKEDITOR.replace('body', {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
		});
	</script>
@endsection