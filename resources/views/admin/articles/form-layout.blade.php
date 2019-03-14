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

	@yield('form')
@endsection

@section('scripts')
	<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script>
	    CKEDITOR.replace('body', {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
		});

		$('#lfm').filemanager('image');

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