@extends('admin.layouts.app')

@section('heading', 'Add Why Choose Item')

@section('button')
    <a href="{{ route('admin_why_choose_item') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_why_choose_item_store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Icon </label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        name="icon" value="{{ old('icon') }}">
                                </div>
                                @error('icon')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <label class="mb-1">Heading</label>
                                    <input type="text" class="form-control @error('heading') is-invalid @enderror"
                                        name="heading" value="{{ old('heading') }}">
                                </div>
                                @error('heading')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-1">
                            <label class="mb-1">Text</label>

                            <textarea name="text" id="text" class="form-control h_100 @error('text') is-invalid @enderror" rows="5">{{ old('text') }}</textarea>
                        </div>
                        @error('text')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="form-group text-end my-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp;Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
