@extends('admin.master')

@section('title', 'Manage Permission Categories')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Permission Categories</h3>
{{--                    @can('permission_category_create')--}}
                        <a href="{{ route('admin.permission-categories.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
{{--                    @endcan--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissionCategories as $permissionCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permissionCategory->name }}</td>
                                        <td>{{ $permissionCategory->slug }}</td>
                                        <td>{!! str()->words(strip_tags($permissionCategory->note), 20, '...') !!}</td>
                                        <td>{{ $permissionCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="">
{{--                                            @can('permission_category_edit')--}}
                                                <a href="{{ route('admin.permission-categories.edit', $permissionCategory->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </a>
{{--                                            @endcan--}}
{{--                                            @can('permission_category_delete')--}}
                                                <form class="d-inline" action="{{ route('admin.permission-categories.destroy', $permissionCategory->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger data-delete-form">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
{{--                                            @endcan--}}
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
