@extends('admin.master')

@section('title', isset($expertTeamMember) ? 'Edit Expert Team Member' : 'Create Expert Team Member')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($expertTeamMember) ? 'Edit' : 'Create' }} Expert Team Member</h3>
                    <a href="{{ route('admin.expert-team-members.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($expertTeamMember) ? route('admin.expert-team-members.update', $expertTeamMember->id) : route('admin.expert-team-members.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($expertTeamMember))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ isset($expertTeamMember) ? $expertTeamMember->name : '' }}" />
                            </div>
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Position*</label>
                            <div class="col-md-9">
                                <input type="text" name="position" id="position" class="form-control" placeholder="Position" value="{{ isset($expertTeamMember) ? $expertTeamMember->position : '' }}" />
                            </div>
                            @error('position') <span class="text-danger">{{ $errors->first('position') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Facebook Link</label>
                            <div class="col-md-9">
                                <input type="text" name="fb_link" id="fb_link" class="form-control" placeholder="Facebook Link" value="{{ isset($expertTeamMember) ? $expertTeamMember->fb_link : '' }}" />
                            </div>
                            @error('fb_link') <span class="text-danger">{{ $errors->first('fb_link') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">X Link</label>
                            <div class="col-md-9">
                                <input type="text" name="x_link" id="x_link" class="form-control" placeholder="X Link" value="{{ isset($expertTeamMember) ? $expertTeamMember->x_link : '' }}" />
                            </div>
                            @error('x_link') <span class="text-danger">{{ $errors->first('x_link') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Twitter Link</label>
                            <div class="col-md-9">
                                <input type="text" name="twitter_link" id="twitter_link" class="form-control" placeholder="Twitter Link" value="{{ isset($expertTeamMember) ? $expertTeamMember->twitter_link : '' }}" />
                            </div>
                            @error('twitter_link') <span class="text-danger">{{ $errors->first('twitter_link') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Linkedin Link</label>
                            <div class="col-md-9">
                                <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" placeholder="Linkedin Link" value="{{ isset($expertTeamMember) ? $expertTeamMember->linkedin_link : '' }}" />
                            </div>
                            @error('linkedin_link') <span class="text-danger">{{ $errors->first('linkedin_link') }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Description</label>
                                <div class="">
                                    <textarea name="description" id="" class="form-control ckeditor">{{ isset($expertTeamMember) ? $expertTeamMember->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($expertTeamMember))
                                    <img src="{{ asset($expertTeamMember->image) }}" alt="" style="height: 80px" />
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($expertTeamMember) && $expertTeamMember->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($expertTeamMember) ? 'Update' : 'Create' }} Expert Team Member">
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
