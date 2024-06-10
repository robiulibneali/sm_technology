@extends('admin.master')

@section('title', isset($user) ? 'Edit User' : 'Create User')

@section('body')
    <div class="row py-5">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($user) ? 'Edit' : 'Create' }} User</h3>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="post">
                        @csrf
                        @if(isset($user))
                            @method('put')
                        @endif

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}" />
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="{{ isset($user) ? $user->mobile : '' }}" />
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : '' }}" />
                        </div>

                        <div class="mt-2 form-group">
                            <label for="" class="fw-bolder">Roles</label>
                            <select name="roles[]" id="" class="form-control select2" multiple required data-placeholder="Select Roles">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                            @if(isset($user))
                                                @if(!empty($user->roles))
                                                    @foreach($user->roles as $userRole)
                                                        @if($role->id == $userRole->id)
                                                            selected
                                                       @endif
                                                    @endforeach
                                                 @endif
                                           @endif >{{ $role->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2">
                            <label for="" class="fw-bolder">Password</label>
                            <input type="text" name="password" class="form-control" value="" />
                        </div>

{{--                        <div class="mt-2">--}}
{{--                            <label for="" class="fw-bolder">Status</label>--}}
{{--                            <div class="material-switch">--}}
{{--                                <input id="someSwitchOptionInfo" name="status" type="checkbox" {{ isset($user) && $user->status == 0 ? '' : 'checked' }} />--}}
{{--                                <label for="someSwitchOptionInfo" class="label-info"></label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div>
                            <input type="submit" class="btn btn-success btn-sm float-end" value="{{ isset($user) ? 'Update' : 'Create' }} User" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
{{--    <style>--}}
{{--        .permission-div input[type="checkbox"] { margin-right: 1px }--}}
{{--        .parent-permission-div label { cursor: pointer; color: white; font-size: 17px }--}}
{{--    </style>--}}
@endpush

@push('script')


{{--    <script>--}}
{{--        $(document).on('click', '.permission-category', function () {--}}
{{--            var isChecked = $(this).prop('checked');--}}
{{--            var permissionCategoryId = $(this).attr('data-permission-category-id');--}}
{{--            if (isChecked)--}}
{{--            {--}}
{{--                $('.permission-of-'+permissionCategoryId).prop('checked', isChecked);--}}
{{--            } else {--}}
{{--                $('.permission-of-'+permissionCategoryId).prop('checked', false);--}}
{{--            }--}}
{{--        })--}}
{{--        $(document).on('click', '.permission', function () {--}}
{{--            var parentDivId = '#'+$(this).closest('div').attr('id');--}}
{{--            if ($(parentDivId + ' input[type="checkbox"]').length == $(parentDivId + ' input[type="checkbox"]:checked').length) {--}}
{{--                $(this).parent().parent().parent().find('.permission-category').prop('checked', true);--}}
{{--            } else {--}}
{{--                $(this).parent().parent().parent().find('.permission-category').prop('checked', false)--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--    @if(isset($user))--}}
{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                setTimeout(function () {--}}
{{--                    $('.parent-permission-div').each(function () {--}}
{{--                        var permissionDiv = '#'+$(this).find('.permission-div').attr('id');--}}
{{--                        if ($(permissionDiv+' input[type="checkbox"]').length == $(permissionDiv+' input[type="checkbox"]:checked').length)--}}
{{--                        {--}}
{{--                            $(this).find('.permission-category').prop('checked', true);--}}
{{--                        }--}}
{{--                    })--}}
{{--                }, 1000)--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.3.2/tinymce.min.js" integrity="sha512-9w/jRiVYhkTCGR//GeGsRss1BJdvxVj544etEHGG1ZPB9qxwF7m6VAeEQb1DzlVvjEZ8Qv4v8YGU8xVPPgovqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: 'textarea#elm1',--}}
{{--            height: 200,--}}
{{--            menubar: false,--}}
{{--            plugins: [--}}
{{--                'advlist autolink lists link image charmap print preview anchor',--}}
{{--                'searchreplace visualblocks code fullscreen',--}}
{{--                'insertdatetime media table paste code help wordcount'--}}
{{--            ],--}}
{{--            toolbar: 'undo redo | formatselect | ' +--}}
{{--                'bold italic backcolor | alignleft aligncenter ' +--}}
{{--                'alignright alignjustify | bullist numlist outdent indent | ' +--}}
{{--                'removeformat | help',--}}
{{--            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'--}}
{{--        });--}}
{{--    </script>--}}

@endpush
