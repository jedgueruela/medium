@extends('admin.articles.form-layout')

@inject('tags', 'App\Tag')

@section('form')
	<form action="{{ route('articles.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="put">
		<label for="title">Title</label>
		<input type="text" name="title" id="title" placeholder="Title" value="{{ $article->title }}">
		<br>
		<label for="title">Body</label>
		<textarea type="text" name="body" id="body" placeholder="Body">{{ $article->body }}</textarea>
		<br>
		<label for="tags">Tags</label>
		<select name="tags[]" id="tags" class="form-control" multiple>
            @foreach($tags->pluck('name') as $tag)
                <option value="{{$tag}}" {{ (in_array($tag, $article->tagList())) ? 'selected' : '' }}>{{$tag}}</option>
            @endforeach
        </select>
		<div class="input-group">
		   	<span class="input-group-btn">
		     	<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a>
		   	</span>
		   	<input id="thumbnail" class="form-control" type="text" name="thumbnail_path" value="{{ $article->thumbnail_path }}">
		</div>
		@if ($article->thumbnail_path)
			<img id="holder" src="{{ $article->thumbnail_path }}" style="margin-top:15px;max-height:100px;">
		@else
			<img id="holder" style="margin-top:15px;max-height:100px;">
		@endif
		<button type="submit">Save</button>
	</form>
@endsection