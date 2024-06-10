@extends('admin.master')

@section('title', isset($ourService) ? 'Edit Our Service' : 'Create Our Service')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($ourService) ? 'Edit' : 'Create' }} Our Service</h3>
                    <a href="{{ route('admin.our-services.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($ourService) ? route('admin.our-services.update', $ourService->id) : route('admin.our-services.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($ourService))
                            @method('put')
                        @endif
                        <div class="row mt-2">
                            <label for="" class="col-md-3">Category Name</label>
                            <div class="col-md-9 form-group">
                                <select name="our_service_category_id" required id="" class="form-control select2">
                                    <option value="" disabled selected>Select a Category</option>
                                    @foreach($ourServiceCategories as $ourServiceCategory)
                                        <option value="{{ $ourServiceCategory->id }}" {{ isset($ourService) && $ourServiceCategory->id == $ourService->our_service_category_id ? 'selected' : '' }}>{{ $ourServiceCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Title*</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ isset($ourService) ? $ourService->title : '' }}" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Icon Class</label>
                            <div class="col-md-9">
                                <input type="text" name="icon_class" id="icon_class" class="form-control" placeholder="Icon Class" value="{{ isset($ourService) ? $ourService->icon_class : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Short Description</label>
                                <div class="">
                                    <textarea name="short_description" id="" class="form-control ckeditor">{{ isset($ourService) ? $ourService->short_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Long Description</label>
                                <div class="">
                                    <textarea name="long_description" id="" class="form-control ckeditor">{{ isset($ourService) ? $ourService->long_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control img-file" accept="image/*" id="imagez" />
{{--                                @if(isset($ourService))--}}
{{--                                    <img src="{{ asset($ourService->image) }}" alt="" style="height: 80px" />--}}
                                    <img src="{{ asset(isset($ourService) ? $ourService->image : '') }}" alt="" style="height: 80px; margin-top: 10px;" id="image" />
{{--                                @endif--}}
                                @error('image') <span class="text-danger">{{ $errors->first('image') }}</span> @enderror
                            </div>
{{--                            <div class="col-md-3 mt-2">--}}
{{--                                <div>--}}
{{--                                    <img src="" id="imagePreview" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Thamb Image</label>
                            <div class="col-md-9">
                                <input type="file" name="thamb_image" class="form-control img-file" accept="image/*" id="imagez" />
{{--                                @if(isset($ourService))--}}
{{--                                    <img src="{{ asset($ourService->thamb_image) }}" alt="" style="height: 80px" />--}}
                                    <img src="{{ asset(isset($ourService) ? $ourService->thamb_image : '') }}" alt="" style="height: 80px; margin-top: 10px;" id="thamb_image" />
{{--                                @endif--}}
                                @error('thamb_image') <span class="text-danger">{{ $errors->first('thamb_image') }}</span> @enderror
                            </div>
{{--                            <div class="col-md-3 mt-2">--}}
{{--                                <div>--}}
{{--                                    <img src="" id="imagePreview" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row mt-4">
                            <label class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($ourService) && $ourService->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($ourService) ? 'Update' : 'Create' }} Our Service">
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
    <script>
        $(document).ready(function() {
            $('.img-file').change(function() {
                var idName = $(this).attr('name');
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#'+idName).attr('src', imgURL).css({
                    height: 150+'px',
                    width: 150+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>
@endpush
