@extends('articles.form-layout')

@section('form')
	<h1 class="mb-8">Add Article</h1>
	<form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">Title</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" type="text" name="title" id="title" value="{{ old('title') }}">
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body">Body</label>
			<div>
				<textarea type="text" name="body" id="body">{{ old('body') }}</textarea>
			</div>
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="tags">Tags</label>
			<select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="tags[]" id="tags" class="form-control" multiple>
				<option value="">Enter Tags</option>
				@if (old('tags'))
					@foreach(old('tags') as $tag)
						<option selected value="{{ $tag }}">{{ $tag }}</option>
					@endforeach
				@endif
			</select>
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="image">Featured Image</label>
		   	<input id="image" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" type="file" name="image">
		</div>
		<button class="no-underline uppercase bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" type="submit">Save</button>
	</form>
@endsection