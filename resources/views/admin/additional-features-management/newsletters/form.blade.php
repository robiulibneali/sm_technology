{{--@extends('admin.master')--}}

{{--@section('title', isset($newsletter) ? 'Edit Newsletter' : 'Create Newsletter')--}}

{{--@section('body')--}}
{{--    <div class="row py-5">--}}
{{--        <div class="col-md-7 mx-auto">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header bg-light">--}}
{{--                    <h3>{{ isset($newsletter) ? 'Edit' : 'Create' }} Newsletter</h3>--}}
{{--                    <a href="{{ route('admin.newsletters.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{ isset($newsletter) ? route('admin.newsletters.update', $newsletter->id) : route('admin.newsletters.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @if(isset($newsletter))--}}
{{--                            @method('put')--}}
{{--                        @endif--}}
{{--                        <div class="row mt-4">--}}
{{--                            <label for="name" class="col-md-3">Name*</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ isset($newsletter) ? $newsletter->name : '' }}" />--}}
{{--                            </div>--}}
{{--                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror--}}
{{--                        </div>--}}
{{--                        <div class="row mt-4">--}}
{{--                            <label for="name" class="col-md-3">Email*</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ isset($newsletter) ? $newsletter->email : '' }}" />--}}
{{--                            </div>--}}
{{--                            @error('email') <span class="text-danger">{{ $errors->first('email') }}</span> @enderror--}}
{{--                        </div>--}}
{{--                        <div class="row mt-4">--}}
{{--                            <label for="name" class="col-md-3">Mobile*</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="{{ isset($newsletter) ? $newsletter->mobile : '' }}" />--}}
{{--                            </div>--}}
{{--                            @error('mobile') <span class="text-danger">{{ $errors->first('mobile') }}</span> @enderror--}}
{{--                        </div>--}}
{{--                        <div class="row mt-4">--}}
{{--                            <label class="col-md-3">Status</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <div class="material-switch">--}}
{{--                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($newsletter) && $newsletter->status == 0 ? '' : 'checked' }} />--}}
{{--                                    <label for="someSwitchOptionLight" class="label-light"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mt-4">--}}
{{--                            <label for="" class="col-md-3"></label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input type="submit" class="btn btn-success" value="{{ isset($newsletter) ? 'Update' : 'Create' }} Newsletter">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

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
