@extends('layouts.app')

@section('content')
	<div class="clearfix mb-8">
		<h1 class="float-left">Articles</h1>
		<a class="float-right no-underline uppercase bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4" href="{{ route('articles.create') }}">Add New Article</a>
	</div>
	@if (!$articles->isEmpty())
		@foreach($articles as $article)
			<div class="bg-white my-4 px-5 py-3 mx-auto shadow-lg overflow-hidden">
				<h3 class="mb-2"><a class="text-grey-darkest no-underline hover:underline" href="{{ route('articles.show', [$article->id]) }}">{{ $article->title }}</a></h3>
				<a href="{{ route('articles.edit', [$article->id]) }}">Edit</a>
				<form class="inline-block" onsubmit="return confirm('Are you sure you want to delete this article?')" action="{{ route('articles.destroy', [$article->id]) }}" method="post">
					@csrf
					<input type="hidden" name="_method" value="DELETE">
					<button type="submit">Delete</button>
				</form>
			</div>
		@endforeach
		{{ $articles->links('pagination') }}
	@else
		<p>No article found.</p>
	@endif
@endsection