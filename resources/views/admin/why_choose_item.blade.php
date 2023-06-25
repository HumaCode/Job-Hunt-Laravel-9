@extends('admin.layouts.app')

@section('heading', 'Why Choose Items')

@section('button')
    <a href="{{ route('admin_why_choose_item_create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add
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
                                    <th>Icon</th>
                                    <th>Icon Preview</th>
                                    <th>Heading</th>
                                    <th>Text</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($why_choose_items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td width="15%">{{ $item->icon }}</td>
                                        <td width="15%" class="text-center"><i class="{{ $item->icon }} fs-2"></i></td>
                                        <td>{{ $item->heading }}</td>
                                        <td>{{ $item->text }}</td>
                                        <td class="pt_10 pb_10 text-center">
                                            <a href="{{ route('admin_why_choose_item_edit', $item->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>
                                                &nbsp; Edit</a> &nbsp;
                                            <a href="{{ route('admin_why_choose_item_delete', $item->id) }}"
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
