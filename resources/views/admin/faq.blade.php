@extends('admin.layouts.app')

@section('heading', 'FAQs')

@section('button')
<a href="{{ route('admin_faq_create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add
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
                                <th>Question</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($faqs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->question }}</td>
                                <td class="pt_10 pb_10 text-center">
                                    <a href="{{ route('admin_faq_edit', $item->id) }}"
                                        class="btn btn-success btn-sm mb-1 mt-1"><i class="fas fa-pencil-alt"></i>
                                        &nbsp; Edit</a> &nbsp;
                                    <a href="{{ route('admin_faq_delete', $item->id) }}" class="btn btn-danger btn-sm"
                                        onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i>
                                        &nbsp; Delete</a>
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