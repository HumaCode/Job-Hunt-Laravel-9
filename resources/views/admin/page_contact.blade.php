@extends('admin.layouts.app')

@section('heading', 'Page Contact Content')


@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_contact_page_update') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Heading *</label>
                                    <input type="text" class="form-control @error('heading') is-invalid @enderror"
                                        name="heading" id="heading" value="{{ old('heading', $page_contact->heading) }}">
                                    @error('heading')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Title *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title', $page_contact->title) }}">
                                    @error('title')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Meta Description *</label>
                            <input type="text" class="form-control @error('meta_description') is-invalid @enderror"
                                name="meta_description" id="meta_description"
                                value="{{ old('meta_description', $page_contact->meta_description) }}">
                            @error('meta_description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Map Code *</label>

                            <textarea name="map_code" id="map_code" class="form-control h_100 @error('map_code') is-invalid @enderror"
                                rows="5">{{ old('map_code', $page_contact->map_code) }}</textarea>
                            @error('map_code')
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
