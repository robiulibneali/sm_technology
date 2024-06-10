@extends('admin.master')

@section('title', isset($permissionCategory) ? 'Edit Permission Category' : 'Create Permission Category')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($permissionCategory) ? 'Edit' : 'Create' }} Permission Category</h3>
                    <a href="{{ route('admin.permission-categories.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($permissionCategory) ? route('admin.permission-categories.update', $permissionCategory->id) : route('admin.permission-categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($permissionCategory))
                            @method('put')
                        @endif
                        <div>
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ isset($permissionCategory) ? $permissionCategory->name : '' }}" />
                        </div>
                        <div class="mt-2">
                            <label for="">note</label>
                            <textarea name="note" class="form-control ckeditor" cols="30" rows="2">{{ isset($permissionCategory) ? $permissionCategory->note : '' }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="">Status</label>
                            <div>
                                <div class="material-switch">
                                    <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($permissionCategory) && $permissionCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionInfo" class="label-info"></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success btn-sm float-end" value="{{ isset($permissionCategory) ? 'Update' : 'Create' }} Permission Category" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
