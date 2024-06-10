@extends('admin.master')

@section('title', isset($portfolio) ? 'Edit Portfolio' : 'Create Portfolio')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($portfolio) ? 'Edit' : 'Create' }} Portfolio</h3>
                    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($portfolio) ? route('admin.portfolios.update', $portfolio->id) : route('admin.portfolios.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($portfolio))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="" class="col-md-3">Portfolio Category</label>
                            <div class="form-group col-md-9">
                                <select name="portfolio_categories[]" id="" class="form-control select2" multiple required data-placeholder="Select Portfolio Categories">
                                    @foreach($portfolioCategories as $portfolioCategory)
                                        <option value="{{ $portfolioCategory->id }}"
                                            @if(isset($portfolio))
                                                @if(!empty($portfolio->$portfolioCategories))
                                                    @foreach($portfolio->portfolioCategories as $selectPortfolioCategory)
                                                        @if($portfolioCategory->id == $selectPortfolioCategory->id)
                                                            selected
                                                        @endif
                                                    @endforeach
                                               @endif
                                           @endif>{{ $portfolioCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Title*</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ isset($portfolio) ? $portfolio->title : '' }}" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Author Name</label>
                            <div class="col-md-9">
                                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Author Name" value="{{ isset($portfolio) ? $portfolio->author_name : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Fb Link</label>
                            <div class="col-md-9">
                                <input type="text" name="fb_link" id="fb_link" class="form-control" placeholder="Fb Link" value="{{ isset($portfolio) ? $portfolio->fb_link : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Twitter Link</label>
                            <div class="col-md-9">
                                <input type="text" name="twitter_link" id="twitter_link" class="form-control" placeholder="Twitter Link" value="{{ isset($portfolio) ? $portfolio->twitter_link : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Instagram Link</label>
                            <div class="col-md-9">
                                <input type="text" name="instagram_link" id="instagram_link" class="form-control" placeholder="Instagram Link" value="{{ isset($portfolio) ? $portfolio->instagram_link : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Linked Link</label>
                            <div class="col-md-9">
                                <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" placeholder="Linked Link" value="{{ isset($portfolio) ? $portfolio->linkedin_link : '' }}" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Short Description</label>
                                <div class="">
                                    <textarea name="short_description" id="" class="form-control ckeditor">{{ isset($portfolio) ? $portfolio->short_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Long Description</label>
                                <div class="">
                                    <textarea name="long_description" id="" class="form-control ckeditor">{{ isset($portfolio) ? $portfolio->long_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" accept="" id="imagez" />
                                @if(isset($portfolio))
                                    <img src="{{ asset($portfolio->image) }}" alt="" style="height: 80px">
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($portfolio) && $portfolio->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($portfolio) ? 'Update' : 'Create' }} Portfolio">
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
