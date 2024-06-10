@extends('admin.master')

@section('title', isset($clientFeedback) ? 'Edit Client Feedbacks' : 'Create Client Feedbacks')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($clientFeedback) ? 'Edit' : 'Create' }} Client Feedback</h3>
                    <a href="{{ route('admin.client-feedbacks.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($clientFeedback) ? route('admin.client-feedbacks.update', $clientFeedback->id) : route('admin.client-feedbacks.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($clientFeedback))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Client Name*</label>
                            <div class="col-md-9">
                                <input type="text" name="client_name" id="client_name" class="form-control" placeholder="Client Name" value="{{ isset($clientFeedback) ? $clientFeedback->client_name : '' }}" />
                            </div>
                            @error('client_name') <span class="text-danger">{{ $errors->first('client_name') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Client Country*</label>
                            <div class="col-md-9">
                                <input type="text" name="client_country" id="client_country" class="form-control" placeholder="Client Country" value="{{ isset($clientFeedback) ? $clientFeedback->client_country : '' }}" />
                            </div>
                            @error('client_country') <span class="text-danger">{{ $errors->first('client_country') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Rating*</label>
                            <div class="col-md-9">
                                <input type="text" name="total_rating" id="total_rating" class="form-control" placeholder="Rating" value="{{ isset($clientFeedback) ? $clientFeedback->total_rating : '' }}" />
                            </div>
                            @error('total_rating') <span class="text-danger">{{ $errors->first('total_rating') }}</span> @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="" class="col-md-3">Feedback</label>
                                <div class="">
                                    <textarea name="feedback" id="" class="form-control ckeditor">{{ isset($clientFeedback) ? $clientFeedback->feedback : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="imagez" class="col-md-3">User Image</label>
                            <div class="col-md-9">
                                <input type="file" name="user_image" class="form-control" accept="image/*" id="imagez" />
                                @if(isset($clientFeedback))
                                    <img src="{{ asset($clientFeedback->user_image) }}" alt="" style="height: 80px" />
                                @endif
                                @error('user_image') <span class="text-danger">{{ $errors->first('user_image') }}</span> @enderror
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
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($clientFeedback) && $clientFeedback->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($clientFeedback) ? 'Update' : 'Create' }} Client Feedbacks">
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
