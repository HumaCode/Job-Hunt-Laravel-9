@extends('admin.layouts.app')

@section('heading', 'Page Term Content')


@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_term_page_update') }}" method="POST">
                        @csrf

                        <div class="form-group mb-1">
                            <label class="mb-1">Heading *</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading"
                                id="heading" value="{{ old('heading', $page_term->heading) }}">
                            @error('heading')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Content *</label>

                            <textarea name="content" id="content" class="form-control h_100 editor @error('content') is-invalid @enderror"
                                rows="5">{{ old('content', $page_term->content) }}</textarea>
                            @error('content')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <h4 class="seo_section">SEO SECTION</h4>
                        <div class="form-group mb-1">
                            <label class="mb-1">Title *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ old('title', $page_term->title) }}">
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Meta Description *</label>

                            <textarea name="meta_description" id="meta_description"
                                class="form-control h_100 @error('meta_description') is-invalid @enderror" rows="5">{{ old('meta_description', $page_term->meta_description) }}</textarea>
                            @error('meta_description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="form-group text-end my-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp; Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#photo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })

        // create otomatis slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/admin/post/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endpush
