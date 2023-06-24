@extends('admin.layouts.app')

@section('heading', 'Add Job Category')

@section('button')
    <a href="{{ route('admin_job_category') }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>&nbsp; View
        All</a>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">

                    <form action="" method="POST">

                        <form action="" method="post" enctype="multipart/form-data">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="mb-1">Category Name</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="mb-1">Category Icon</label>
                                        <input type="text" class="form-control" name="icon" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                    &nbsp;Submit</button>
                            </div>
                        </form>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
