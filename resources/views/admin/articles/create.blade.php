@extends('admin.articles.form-layout')

@inject('tags', 'App\Tag')

@section('form')
	<form class="w-full max-w-lg" action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex flex-wrap -mx-3 mb-6">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">Title</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" type="text" name="title" id="title" placeholder="Title">
		</div>
		<div class="flex flex-wrap -mx-3 mb-6">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="body">Body</label>
			<br>
			<textarea type="text" name="body" id="body" placeholder="Body"></textarea>
		</div>
		<div class="flex flex-wrap -mx-3 mb-6">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="tags">Tags</label>
			<select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="tags[]" id="tags" class="form-control" multiple>
				@foreach($tags->pluck('name') as $tag)
				<option value="{{$tag}}">{{$tag}}</option>
				@endforeach
			</select>
		</div>
		<div class="input-group">
		   	<span class="input-group-btn">
		     	<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a>
		   	</span>
		   	<input id="thumbnail" class="form-control" type="text" name="thumbnail_path">
		</div>
		<img id="holder" style="margin-top:15px;max-height:100px;">
		<button type="submit">Save</button>
	</form>
@endsection