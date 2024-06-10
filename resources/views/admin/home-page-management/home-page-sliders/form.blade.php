@extends('admin.master')

@section('title', isset($homePageSlider) ? 'Edit Home Page Slider' : 'Create Home Page Slider')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($homePageSlider) ? 'Edit' : 'Create' }} Home Page Slider</h3>
                    <a href="{{ route('admin.home-page-sliders.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($homePageSlider) ? route('admin.home-page-sliders.update', $homePageSlider->id) : route('admin.home-page-sliders.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($homePageSlider))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Title*</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ isset($homePageSlider) ? $homePageSlider->title : '' }}" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Service Link</label>
                            <div class="col-md-9">
                                <input type="text" name="service_link" id="service_link" class="form-control" placeholder="Service Link" value="{{ isset($homePageSlider) ? $homePageSlider->service_link : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Note</label>
                                <div class="">
                                    <textarea name="note" id="" class="form-control ckeditor">{{ isset($homePageSlider) ? $homePageSlider->note : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="slider_image" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($homePageSlider))
                                    <img src="{{ asset($homePageSlider->slider_image) }}" alt="" style="height: 80px" />
                                @endif
                                @error('slider_image') <span class="text-danger">{{ $errors->first('slider_image') }}</span> @enderror
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($homePageSlider) && $homePageSlider->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($homePageSlider) ? 'Update' : 'Create' }} Home Page Slider">
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
