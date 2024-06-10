@extends('admin.master')

@section('title', 'Manage Blogs')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Blogs</h3>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Blog Category</td>
                                <td>Author Name</td>
                                <td>Title</td>
                                <td>Short Description</td>
                                <td>Long Description</td>
                                <td>Hit Count</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->blogCategory->name ?? '' }}</td>
                                        <td>{{ $blog->authorName->name ?? '' }}</td>
                                        <td>{{ $blog->title ?? '' }}</td>
                                        <td>{!! str()->words(strip_tags($blog->short_description), 20, '...') !!}</td>
                                        <td>{!! str()->words(strip_tags($blog->long_description), 20, '...') !!}</td>
                                        <td>{{ $blog->hit_count ?? '' }}</td>
                                        <td><img src="{{ asset(!empty($blog->main_image) ? $blog->main_image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                        <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" id="deleteItem" method="post">
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
