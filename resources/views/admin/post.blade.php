@extends('admin.layouts.app')

@section('heading', 'Posts')

@section('button')
    <a href="{{ route('admin_post_create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add
        Data</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Photo</th>
                                    <th>Heading</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td class="text-center">
                                            <img src="{{ $item->photo == null ? asset('dist-front/uploads/banner1.jpg') : \Storage::url($item->photo) }}"
                                                class="w_150" alt="">
                                        </td>
                                        <td>{{ $item->heading }}</td>
                                        <td class="pt_10 pb_10 text-center">
                                            <a href="{{ route('admin_post_edit', $item->slug) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>
                                                &nbsp; Edit</a> &nbsp;
                                            <a href="{{ route('admin_post_delete', $item->slug) }}"
                                                class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i
                                                    class="fas fa-trash"></i>
                                                &nbsp;Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
