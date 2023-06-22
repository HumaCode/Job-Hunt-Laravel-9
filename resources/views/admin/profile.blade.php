@extends('admin.layouts.app')

@section('heading', 'Profil Admin')

@section('main_content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $profile->id }}">

                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <img src="{{ ($profile->photo == null) ? asset('dist/img/user.png') : \Storage::url($profile->photo) }}"
                                alt="" class="profile-photo w_100_p" id="showImage">
                            <input type="file" class="form-control mt_10" name="photo" id="photo">
                        </div>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ $profile->email }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Retype Password</label>
                                <input type="password" class="form-control" name="retype_password">
                            </div>
                            <div class="mb-4">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection