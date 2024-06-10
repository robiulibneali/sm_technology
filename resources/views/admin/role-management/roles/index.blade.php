@extends('admin.master')

@section('title', 'Manage Roles')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Roles</h3>
{{--                    @can('role_create')--}}
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
{{--                    @endcan--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Note</th>
                                <th>Permissions</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td>{!! str()->words(strip_tags($role->note), 20, '...') !!}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-sm bg-primary">{{ $permission->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="">
{{--                                        @can('role_edit')--}}
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
{{--                                        @endcan--}}
{{--                                        @can('role_delete')--}}
                                            <form class="d-inline" action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger data-delete-form">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
{{--                                        @endcan--}}
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
