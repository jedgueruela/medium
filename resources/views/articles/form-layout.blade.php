@extends('layouts.admin')

@section('embedded-style')
	<style>
		.select2-container--default .select2-selection--multiple {
			border-color: #f1f5f8 !important;
			height: 46px !important;
			padding-top: 10px !important;
			background: #f1f5f8 !important;
		}
	</style>
@endsection

@section('content')
	@if ($errors->any())
		<div class="mb-8 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
			<p class="mb-2"><strong class="font-bold">Oh boy!</strong> <span class="block sm:inline">Please fix the following errors below:</span>
  			</p>
		    <ul>
		        @foreach ($errors->all() as $error)
		            <li class="text-red">{{ $error }}</li>
		        @endforeach
		    </ul>
		</div>
	@endif

	@yield('form')
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

		$('#tags').select2({
            placeholder: 'Enter tags',
            tags: true,
            minimumInputLength: 3,
            ajax: {
                dataType: 'json',
                url: '{{ url("api/tags") }}',
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                  	return {
	                    results: data
                  	};
                },
            }
        });
	</script>
@endsection