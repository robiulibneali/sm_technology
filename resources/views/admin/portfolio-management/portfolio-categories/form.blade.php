@extends('admin.master')

@section('title', isset($portfolioCategory) ? 'Edit Portfolio Category' : 'Create Portfolio Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($portfolioCategory) ? 'Edit' : 'Create' }} Portfolio Category</h3>
                    <a href="{{ route('admin.portfolio-categories.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($portfolioCategory) ? route('admin.portfolio-categories.update', $portfolioCategory->id) : route('admin.portfolio-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($portfolioCategory))
                            @method('put')
                        @endif
                        <input type="hidden" name="portfolio_category_id" value="{{ isset($portfolioCategory) ? $portfolioCategory->portfolio_category_id : (isset($_GET['portfolio_category_id']) ? $_GET['portfolio_category_id'] : 0) }}" />
{{--                        <input type="hidden" name="portfolio_category_id" value="{{ $_GET['portfolio_category_id'] ?? 0}}" />--}}
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ isset($portfolioCategory) ? $portfolioCategory->name : '' }}" />
                            </div>
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Description</label>
                                <div class="">
                                    <textarea name="description" id="" class="form-control ckeditor">{{ isset($portfolioCategory) ? $portfolioCategory->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" accept="" id="imagez" />
                                @if(isset($portfolioCategory))
                                    <img src="{{ asset($portfolioCategory->image) }}" alt="" style="height: 80px">
                                @endif
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($portfolioCategory) && $portfolioCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($portfolioCategory) ? 'Update' : 'Create' }} Portfolio Category">
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
