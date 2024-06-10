@extends('admin.master')

@section('title', isset($role) ? 'Edit Role' : 'Create Role')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($role) ? 'Edit' : 'Create' }} Role</h3>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($role) ? route('admin.roles.update', $role->id) : route('admin.roles.store') }}" method="post">
                        @csrf
                        @if(isset($role))
                            @method('put')
                        @endif

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ isset($role) ? $role->title : '' }}" />
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Permissions</label>
                            <div>
                                @foreach($permissionCategories as $key => $permissionCategory)
                                    <div class="parent-permission-div shadow bg-success-gradient">
                                        <label for="parentInput{{ $key }}" class="ms-3 mt-2"><input type="checkbox" id="parentInput{{ $key }}" class="permission-category" data-permission-category-id="{{ $permissionCategory->id }}"> <span class="f-s-20">{{ $permissionCategory->name }}</span></label>
                                        <div class="ms-5 permission-div" id="permissionCategory{{ $permissionCategory->id }}">
                                            @if(!empty($permissionCategory->permissions))
                                                @foreach($permissionCategory->permissions as $permissionKey => $permission)
                                                    <label for="permission-{{ $key.$permissionKey }}" class="me-2 py-1">
                                                        <input type="checkbox" @if(isset($role))
                                                            @if(!empty($role->permissions))
                                                                @foreach($role->permissions as $permissionDb)
                                                                    @if($permissionDb->id == $permission->id)
                                                                        checked
                                                                     @endif
                                                               @endforeach
                                                                     @endif
                                                                     @endif class="permission-of-{{ $permissionCategory->id }} permission" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $key.$permissionKey }}"> <span >{{ $permission->title }}</span></label>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Note</label>
                            <textarea name="note" class="form-control ckeditor" cols="30" rows="10">{!! isset($role) ? $role->note : '' !!}</textarea>
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Status</label>
                            <div class="material-switch">
                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($role) && $role->status == 0 ? '' : 'checked' }} />
                                <label for="someSwitchOptionInfo" class="label-info"></label>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success btn-sm float-end" value="{{ isset($role) ? 'Update' : 'Create' }} Role" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .permission-div input[type="checkbox"] { margin-right: 1px }
        .parent-permission-div label { cursor: pointer; color: white; font-size: 17px }
    </style>
@endpush

@push('script')


    <script>
        $(document).on('click', '.permission-category', function () {
            var isChecked = $(this).prop('checked');
            var permissionCategoryId = $(this).attr('data-permission-category-id');
            if (isChecked)
            {
                $('.permission-of-'+permissionCategoryId).prop('checked', isChecked);
            } else {
                $('.permission-of-'+permissionCategoryId).prop('checked', false);
            }
        })
        $(document).on('click', '.permission', function () {
            var parentDivId = '#'+$(this).closest('div').attr('id');
            if ($(parentDivId + ' input[type="checkbox"]').length == $(parentDivId + ' input[type="checkbox"]:checked').length) {
                $(this).parent().parent().parent().find('.permission-category').prop('checked', true);
            } else {
                $(this).parent().parent().parent().find('.permission-category').prop('checked', false)
            }
        })
    </script>
    @if(isset($role))
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $('.parent-permission-div').each(function () {
                        var permissionDiv = '#'+$(this).find('.permission-div').attr('id');
                        if ($(permissionDiv+' input[type="checkbox"]').length == $(permissionDiv+' input[type="checkbox"]:checked').length)
                        {
                            $(this).find('.permission-category').prop('checked', true);
                        }
                    })
                }, 1000)
            })
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.3.2/tinymce.min.js" integrity="sha512-9w/jRiVYhkTCGR//GeGsRss1BJdvxVj544etEHGG1ZPB9qxwF7m6VAeEQb1DzlVvjEZ8Qv4v8YGU8xVPPgovqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: 'textarea#elm1',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>

@endpush
