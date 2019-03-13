@extends('admin.master')

@section('content')
	<a href="{{ route('articles.create') }}">Add New Article</a>
	@if (!$articles->isEmpty())
		<table>
			<tr>
				<th>Title</th>
				<th>Action</th>
			</tr>
			@foreach($articles as $article)
				<tr>
					<td><p><a href="{{ route('articles.edit', [$article->id]) }}">{{ $article->title }}</a></p></td>
					<td>
						<form onsubmit="return confirm('Are you sure you want to delete this article?')" action="{{ route('articles.destroy', [$article->id]) }}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		{{ $articles->links() }}
	@else
		<p>No article found.</p>
	@endif
@endsection