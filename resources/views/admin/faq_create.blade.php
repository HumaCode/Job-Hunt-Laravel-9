@extends('admin.layouts.app')

@section('heading', 'Add FAQs')

@section('button')
    <a href="{{ route('admin_faq') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin_faq_store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-1">

                            <label class="mb-1">Question</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror"
                                name="question" value="{{ old('question') }}">
                        </div>
                        @error('question')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="form-group mb-1">
                            <label class="mb-1">Answer</label>

                            <textarea name="answer" id="answer" class="form-control editor @error('answer') is-invalid @enderror"
                                rows="10">{{ old('answer') }}</textarea>

                            @error('answer')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                &nbsp;Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
