@extends('admin.master')

@section('title', 'Manage Our Services')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Our Services</h3>
                    <a href="{{ route('admin.our-services.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Our Service Category</td>
                                <td>Title</td>
                                <td>Icon Class</td>
                                <td>Short Description</td>
                                <td>Long Description</td>
                                <td>View Count</td>
                                <td>Image</td>
                                <td>Thamb Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ourServices as $ourService)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ourService->ourServiceCategory->name ?? '' }}</td>
                                        <td>{{ $ourService->title ?? '' }}</td>
                                        <td>{{ $ourService->icon_class ?? '' }}</td>
                                        <td>{!! str()->words(strip_tags($ourService->short_description), 20, '...') !!}</td>
                                        <td>{!! str()->words(strip_tags($ourService->long_description), 20, '...') !!}</td>
                                        <td>{{ $ourService->view_count ?? '' }}</td>
                                        <td><img src="{{ asset(!empty($ourService->image) ? $ourService->image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                        <td><img src="{{ asset(!empty($ourService->thamb_image) ? $ourService->thamb_image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                        <td>{{ $ourService->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.our-services.edit', $ourService->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.our-services.destroy', $ourService->id) }}" id="deleteItem" method="post">
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
