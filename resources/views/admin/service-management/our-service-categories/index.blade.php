@extends('admin.master')

@section('title', 'Manage Our Service Categories')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Our Service Categories</h3>
                    <a href="{{ route('admin.our-service-categories.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Icon Class</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ourServiceCategories as $ourServiceCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ourServiceCategory->name ?? '' }}</td>
                                        <td>{{ $ourServiceCategory->icon_class ?? '' }}</td>
                                        <td>{!! str()->words(strip_tags($ourServiceCategory->description), 20, '...') !!}</td>
                                        <td>{{ $ourServiceCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.our-service-categories.edit', $ourServiceCategory->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.our-service-categories.destroy', $ourServiceCategory->id) }}" id="deleteItem" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger delete-item ms-1"><i class="fa fa-trash-o"></i></button>
                                            </form>
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
