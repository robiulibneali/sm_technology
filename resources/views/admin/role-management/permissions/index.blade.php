@extends('admin.master')

@section('title', 'Manage Permissions')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="">Manage Permissions</h4>
{{--                    @can('permission_create')--}}
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
{{--                    @endcan--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!!  $permission->permissionCategory->name !!}</td>
                                <td>{{ $permission->title }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>{{ $permission->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="">
{{--                                    @can('permission_edit')--}}
                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
{{--                                    @endcan--}}
{{--                                    @can('permission_delete')--}}
                                        <form class="d-inline" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post" >
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger data-delete-form">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
{{--                                    @endcan--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
