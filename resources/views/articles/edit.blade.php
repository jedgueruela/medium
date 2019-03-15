@extends('articles.form-layout')

@inject('tags', 'App\Tag')

@section('form')
	<h1 class="mb-8">Edit Article</h1>
	<form action="{{ route('articles.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" value="put" name="_method">
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">Title</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" type="text" name="title" id="title" value="{{ $article->title }}">
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body">Body</label>
			<div>
				<textarea type="text" name="body" id="body">{{ $article->body }}</textarea>
			</div>
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="tags">Tags</label>
			<select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="tags[]" id="tags" class="form-control" multiple>
				@foreach($tags->pluck('name') as $tag)
                	<option value="{{$tag}}" {{ (in_array($tag, $article->tagList())) ? 'selected' : '' }}>{{$tag}}</option>
            	@endforeach
			</select>
		</div>
		<div class="input-group">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="image">Featured Image</label>
		   	<input id="image" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" type="file" name="image">
		</div>
		@if ($article->thumbnail_path)
			<img id="holder" src="{{ $article->thumbnail_path }}" style="margin-top:15px;max-height:100px;">
		@else
			<img id="holder" style="margin-top:15px;max-height:100px;">
		@endif
		<button class="no-underline uppercase bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" type="submit">Save</button>
	</form>
@endsection