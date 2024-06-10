@extends('admin.master')

@section('title', 'Manage Roles')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Roles</h3>
{{--                    @can('user_create')--}}
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
{{--                    @endcan--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Roles</th>
{{--                                <th>Status</th>--}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge badge-sm bg-primary">{{ $role->title }}</span>
                                        @endforeach
                                    </td>
{{--                                    <td>{{ $user->status == 1 ? 'Published' : 'Unpublished' }}</td>--}}
                                    <td class="">
{{--                                        @can('user_edit')--}}
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
{{--                                        @endcan--}}
{{--                                        @can('user_delete')--}}
                                            <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
