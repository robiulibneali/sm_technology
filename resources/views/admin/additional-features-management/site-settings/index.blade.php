@extends('admin.master')

@section('title', 'Site Settings')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>Site Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($siteSettings) ? route('admin.site-settings.update', $siteSettings->id) : route('admin.site-settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($siteSettings))
                            @method('put')
                        @endif
                        <div class="row mt-5 justify-content-between">
                            <div class="col-md-2">
                                <label for="" class="">Site Name</label>
                                <div class="">
                                    <input type="text" name="site_name" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->site_name : old('site_name') }}" placeholder="Site Name" />
                                    @error('site_name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Title</label>
                                <div class="">
                                    <input type="text" name="title" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->title : old('title') }}" placeholder="Site Title" />
                                    @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Email</label>
                                <div>
                                    <input type="email" name="email" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->email : old('email') }}" placeholder="Email" />
                                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Phone</label>
                                <div>
                                    <input type="text" name="phone" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->phone : old('phone') }}" placeholder="Phone" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Location</label>
                                <div>
                                    <input type="text" name="google_map_embade_location_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->google_map_embade_location_link : old('google_map_embade_location_link') }}" placeholder="Location" />
                                    @error('google_map_embade_location_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Address</label>
                            <div id="">
                                <textarea name="address" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->address : old('address') }}</textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Common Meta</label>
                            <div id="">
                                <textarea name="common_meta" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->common_meta : old('common_meta') }}</textarea>
                                @error('common_meta') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Common SEO Header</label>
                            <div id="">
                                <textarea name="common_seo_header" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->common_seo_header : old('common_seo_header') }}</textarea>
                                @error('common_seo_header') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Common SEO Footer</label>
                            <div id="">
                                <textarea name="common_seo_footer" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->common_seo_footer : old('common_seo_footer') }}</textarea>
                                @error('common_seo_footer') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Meta Description</label>
                            <div id="">
                                <textarea name="meta_description" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->meta_description : old('meta_description') }}</textarea>
                                @error('meta_description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="">Footer Description</label>
                            <div id="">
                                <textarea name="footer_description" class="form-control ckeditor">{{ isset($siteSettings) ? $siteSettings->footer_description : old('footer_description') }}</textarea>
                                @error('footer_description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-4">
                                <label for="">Logo</label>
                                <div>
                                    <input type="file" name="logo" class="form-control img-file" accept="image/*" />
                                    <img src="{{ asset(isset($siteSettings) ? $siteSettings->logo : '') }}" alt="" style="height: 60px; margin-top: 10px;" id="logo" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Site Banner</label>
                                <div>
                                    <input type="file" name="site_banner" class="form-control img-file" accept="image/*" />
                                    <img src="{{ asset(isset($siteSettings) ? $siteSettings->site_banner : '') }}" alt="" style="height: 60px; margin-top: 10px;" id="site_banner" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Favicon</label>
                                <div>
                                    <input type="file" name="favicon" class="form-control img-file" accept="image/*" />
                                    <img src="{{ asset(isset($siteSettings) ? $siteSettings->favicon : '') }}" alt="" style="height: 20px; margin-top: 10px;" id="favicon" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 justify-content-between">
                            <div class="col-md-2">
                                <label for="">Twitter Link</label>
                                <div>
                                    <input type="text" name="twitter_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->twitter_link : old('twitter_link') }}" placeholder="Twitter Link" />
                                    @error('twitter_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">X Link</label>
                                <div>
                                    <input type="text" name="x_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->x_link : old('x_link') }}" placeholder="X Link" />
                                    @error('x_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Facebook Link</label>
                                <div>
                                    <input type="text" name="fb_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->fb_link : old('fb_link') }}" placeholder="Facebook Link" />
                                    @error('fb_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Youtube Link</label>
                                <div>
                                    <input type="text" name="youtube_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->youtube_link : old('youtube_link') }}" placeholder="Youtube Link" />
                                    @error('youtube_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Linkedin Link</label>
                                <div>
                                    <input type="text" name="linkedin_link" class="form-control" value="{{ isset($siteSettings) ? $siteSettings->linkedin_link : old('linkedin_link') }}" placeholder="Linkedin Link" />
                                    @error('linkedin_link') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success" value="{{ isset($siteSettings) ? 'Update' : 'Create' }} Site Setting">
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
            $('.img-file').change(function() {
                var idName = $(this).attr('name');
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#'+idName).attr('src', imgURL).css({
                    height: 60+'px',
                    width: 80+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>
@endpush
