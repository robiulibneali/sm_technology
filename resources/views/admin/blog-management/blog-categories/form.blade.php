@extends('admin.master')

@section('title', isset($blogCategory) ? 'Edit Blog Category' : 'Create Blog Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($blogCategory) ? 'Edit' : 'Create' }} Blog Category</h3>
                    <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($blogCategory) ? route('admin.blog-categories.update', $blogCategory->id) : route('admin.blog-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($blogCategory))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="client_name" class="form-control" placeholder="Name" value="{{ isset($blogCategory) ? $blogCategory->name : '' }}" />
                            </div>
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">About</label>
                                <div class="">
                                    <textarea name="about" id="" class="form-control ckeditor">{{ isset($blogCategory) ? $blogCategory->about : '' }}</textarea>
                                </div>
                                @error('about') <span class="text-danger">{{ $errors->first('about') }}</span> @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($blogCategory))
                                    <img src="{{ asset($blogCategory->image) }}" alt="" style="height: 80px" />
                                @endif
                                @error('image') <span class="text-danger">{{ $errors->first('image') }}</span> @enderror
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($blogCategory) && $blogCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($blogCategory) ? 'Update' : 'Create' }} Blog Category">
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
