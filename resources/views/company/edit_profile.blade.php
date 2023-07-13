@extends('front.layouts.app')


@section('seo_title')
Edit Profile
@endsection

@section('seo_meta_description')
Edit Profile
@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('dist-front/uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Profile</h2>
            </div>
        </div>
    </div>
</div>


<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                @include('company.sidebar')
            </div>
            <div class="col-lg-9 col-md-12">
                <form action="{{ route('company_edit_profile_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Logo</label>
                            <div class="form-group">
                                <img src="{{ ($company_profile->logo == null) ? asset('dist/img/noimage.png') : \Storage::url($company_profile->logo) }}"
                                    alt="" class="logo" id="showImage" />
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Logo</label>
                            <div class="form-group">
                                <input type="file" name="logo" id="logo" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Company Name *</label>
                            <div class="form-group">
                                <input type="text" name="company_name" class="form-control"
                                    value="{{ $company_profile->company_name }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Contact Person *</label>
                            <div class="form-group">
                                <input type="text" name="person_name" class="form-control"
                                    value="{{ $company_profile->person_name }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Username *</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control"
                                    value="{{ $company_profile->username }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control"
                                    value="{{ $company_profile->email }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone *</label>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $company_profile->phone }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address *</label>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control"
                                    value="{{ $company_profile->address }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Location *</label>
                            <div class="form-group">
                                <select name="company_country_id" class="form-control select2">
                                    <option selected disabled>-- Choose --</option>

                                    @foreach ($company_locations as $item)

                                    @if ($item->id == $company_profile->company_country_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Company Size *</label>
                            <div class="form-group">
                                <select name="company_size_id" class="form-control select2">
                                    <option selected disabled>-- Choose --</option>

                                    @foreach ($company_sizes as $item)
                                    @if ($item->id == $company_profile->company_size_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Industry *</label>
                            <div class="form-group">
                                <select name="company_industry_id" class="form-control select2">
                                    <option selected disabled>-- Choose --</option>

                                    @foreach ($company_industries as $item)
                                    @if ($item->id == $company_profile->company_industry_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Website</label>
                            <div class="form-group">
                                <input type="text" name="website" class="form-control"
                                    value="{{ $company_profile->website }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Founded On *</label>
                            <div class="form-group">
                                <select name="founded_on" class="form-control select2">
                                    <option selected disabled>-- Choose --</option>

                                    @for ($i = 1980; $i <= date('Y'); $i++) @if ($i==$company_profile->founded_on)
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif

                                        @endfor

                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">About Company *</label>
                                <textarea name="description" class="form-control editor" cols="30"
                                    rows="10">{{ $company_profile->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Monday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_mon" class="form-control"
                                    value="{{ $company_profile->oh_mon }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Tuesday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_tue" class="form-control"
                                    value="{{ $company_profile->oh_tue }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Wednesday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_wed" class="form-control"
                                    value="{{ $company_profile->oh_wed }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Thursday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_thu" class="form-control"
                                    value="{{ $company_profile->oh_thu }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Friday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_fri" class="form-control"
                                    value="{{ $company_profile->oh_fri }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Saturday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_sat" class="form-control"
                                    value="{{ $company_profile->oh_sat }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Sunday)</label>
                            <div class="form-group">
                                <input type="text" name="oh_sun" class="form-control"
                                    value="{{ $company_profile->oh_sun }}" />
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Location Map (Google Map Code)</label>
                            <div class="form-group">
                                <textarea name="map_code" class="form-control h-150" cols="30" rows="10">
{{ $company_profile->map_code }}
</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Facebook</label>
                            <div class="form-group">
                                <input type="text" name="facebook" class="form-control"
                                    value="{{ $company_profile->facebook }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Twitter</label>
                            <div class="form-group">
                                <input type="text" name="twitter" class="form-control"
                                    value="{{ $company_profile->twitter }}" />
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Linkedin</label>
                            <div class="form-group">
                                <input type="text" name="linkedin" class="form-control"
                                    value="{{ $company_profile->linkedin }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram</label>
                            <div class="form-group">
                                <input type="text" name="instagram" class="form-control"
                                    value="{{ $company_profile->instagram }}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update" />
                        </div>
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
            $('#logo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
</script>
@endpush