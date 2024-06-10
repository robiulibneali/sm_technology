@extends('admin.master')

@section('title', isset($ourServiceCategory) ? 'Edit Our Service Category' : 'Create Our Service Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($ourServiceCategory) ? 'Edit' : 'Create' }} Our Service Category</h3>
                    <a href="{{ route('admin.our-service-categories.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($ourServiceCategory) ? route('admin.our-service-categories.update', $ourServiceCategory->id) : route('admin.our-service-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($ourServiceCategory))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ isset($ourServiceCategory) ? $ourServiceCategory->name : '' }}" />
                            </div>
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Icon Class</label>
                            <div class="col-md-9">
                                <input type="text" name="icon_class" id="icon_class" class="form-control" placeholder="Icon Class" value="{{ isset($ourServiceCategory) ? $ourServiceCategory->icon_class : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Description</label>
                                <div class="">
                                    <textarea name="description" id="" class="form-control ckeditor">{{ isset($ourServiceCategory) ? $ourServiceCategory->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($ourServiceCategory) && $ourServiceCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($ourServiceCategory) ? 'Update' : 'Create' }} Our Service Category">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#imagez').change(function() {--}}
{{--                var imgURL = URL.createObjectURL(event.target.files[0]);--}}
{{--                $('#imagePreview').attr('src', imgURL).css({--}}
{{--                    height: 150+'px',--}}
{{--                    width: 150+'px',--}}
{{--                    marginTop: '5px'--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush
