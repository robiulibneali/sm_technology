@extends('admin.master')

@section('title', isset($ourCustomer) ? 'Edit Our Customer' : 'Create Our Customer')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($ourCustomer) ? 'Edit' : 'Create' }} Our Customer</h3>
                    <a href="{{ route('admin.our-customers.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($ourCustomer) ? route('admin.our-customers.update', $ourCustomer->id) : route('admin.our-customers.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($ourCustomer))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Company Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" value="{{ isset($ourCustomer) ? $ourCustomer->company_name : '' }}" />
                            </div>
                            @error('company_name') <span class="text-danger">{{ $errors->first('company_name') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Person Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="person_name" id="person_name" class="form-control" placeholder="Person Name" value="{{ isset($ourCustomer) ? $ourCustomer->person_name : '' }}" />
                            </div>
                            @error('person_name') <span class="text-danger">{{ $errors->first('person_name') }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Description</label>
                                <div class="">
                                    <textarea name="description" id="" class="form-control ckeditor">{{ isset($ourCustomer) ? $ourCustomer->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Company Logo</label>
                            <div class="col-md-9">
                                <input type="file" name="company_logo" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($ourCustomer))
                                    <img src="{{ asset($ourCustomer->company_logo) }}" alt="" style="height: 80px" />
                                @endif
                                @error('company_logo') <span class="text-danger">{{ $errors->first('company_logo') }}</span> @enderror
                            </div>
                            <div class="col-md-3 mt-2">
                                <div>
                                    <img src="" id="imagePreview" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($ourCustomer) && $ourCustomer->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($ourCustomer) ? 'Update' : 'Create' }} Our Customer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#imagez').change(function() {
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#imagePreview').attr('src', imgURL).css({
                    height: 150+'px',
                    width: 150+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>
@endpush
