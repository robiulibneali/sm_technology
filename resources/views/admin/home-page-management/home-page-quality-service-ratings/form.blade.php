@extends('admin.master')

@section('title', isset($homePageQualityServiceRating) ? 'Edit Home Page Quality Service Rating' : 'Create Home Page Quality Service Rating')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($homePageQualityServiceRating) ? 'Edit' : 'Create' }} Home Page Quality Service Rating</h3>
                    <a href="{{ route('admin.home-page-quality-service-ratings.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($homePageQualityServiceRating) ? route('admin.home-page-quality-service-ratings.update', $homePageQualityServiceRating->id) : route('admin.home-page-quality-service-ratings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($homePageQualityServiceRating))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Title*</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ isset($homePageQualityServiceRating) ? $homePageQualityServiceRating->title : '' }}" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Rating*</label>
                            <div class="col-md-9">
                                <input type="text" name="rating" id="rating" class="form-control" placeholder="Rating" value="{{ isset($homePageQualityServiceRating) ? $homePageQualityServiceRating->rating : '' }}" />
                            </div>
                            @error('rating') <span class="text-danger">{{ $errors->first('rating') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($homePageQualityServiceRating) && $homePageQualityServiceRating->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($homePageQualityServiceRating) ? 'Update' : 'Create' }} Home Page Quality Service Rating">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@push('script')--}}
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
{{--@endpush--}}
