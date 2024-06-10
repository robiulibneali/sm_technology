@extends('admin.master')

@section('title', isset($homePageCounter) ? 'Edit Home Page Counter' : 'Create Home Page Counter')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($homePageCounter) ? 'Edit' : 'Create' }} Home Page Counter</h3>
                    <a href="{{ route('admin.home-page-counters.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($homePageCounter) ? route('admin.home-page-counters.update', $homePageCounter->id) : route('admin.home-page-counters.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($homePageCounter))
                            @method('put')
                        @endif
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Title*</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ isset($homePageCounter) ? $homePageCounter->title : '' }}" />
                            </div>
                            @error('title') <span class="text-danger">{{ $errors->first('title') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label for="name" class="col-md-3">Counter Number*</label>
                            <div class="col-md-9">
                                <input type="text" name="counter_number" id="counter_number" class="form-control" placeholder="Counter Number" value="{{ isset($homePageCounter) ? $homePageCounter->counter_number : '' }}" />
                            </div>
                            @error('counter_number') <span class="text-danger">{{ $errors->first('counter_number') }}</span> @enderror
                        </div>
                        <div class="row mt-4">
                            <label class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="someSwitchOptionLight" name="status" type="checkbox" {{ isset($homePageCounter) && $homePageCounter->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionLight" class="label-light"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="{{ isset($homePageCounter) ? 'Update' : 'Create' }} Home Page Counter">
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
