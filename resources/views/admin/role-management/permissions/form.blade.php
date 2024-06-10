@extends('admin.master')

@section('title', isset($permission) ? 'Edit Permission' : 'Create Permission')

@section('body')
    <div class="row py-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="">{{ isset($permission) ? 'Edit' : 'Create' }} Permission</h4>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($permission) ? route('admin.permissions.update', $permission->id) : route('admin.permissions.store') }}" method="post">
                        @csrf
                        @if(isset($permission))
                            @method('put')
                        @endif
                        <div class="mt-2 form-group">
                            <label for="">Permission Category</label>
                            <select name="permission_category_id" class="form-control select2" required data-placeholder="<-- Select a Permission Category -->" id="">
                                <option value=""></option>
                                @foreach($permissionCategories as $permissionCategory)
                                    <option value="{{ $permissionCategory->id }}" {{ isset($permission) && $permission->permission_category_id == $permissionCategory->id ? 'selected' : '' }}>{{ $permissionCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ isset($permission) ? $permission->title : '' }}" />
                        </div>

                        <div class="mt-2">
                            <label for="">Status</label>
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($permission) && $permission->status == 0 ? '' : 'checked' }}>
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success btn-sm float-end" value="{{ isset($permission) ? 'Update' : 'Create' }} Permission" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')
@endpush
