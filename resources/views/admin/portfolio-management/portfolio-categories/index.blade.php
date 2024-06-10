@extends('admin.master')

@section('title', 'Manage Portfolio Categories')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Portfolio Categories</h3>
                    <a href="{{ route('admin.portfolio-categories.create', ['portfolio_category_id' => isset($_GET['portfolio_category_id']) ? $_GET['portfolio_category_id'] : 0]) }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolioCategories as $portfolioCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('admin.portfolio-categories.index', ['portfolio_category_id' => $portfolioCategory->id]) }}" class="nav-link text-warning">{{ $portfolioCategory->name ?? '' }}</a>
                                        </td>
                                        <td>{!! str()->words(strip_tags($portfolioCategory->description), 20, '...') !!}</td>
                                        <td><img src="{{ asset(!empty($portfolioCategory->image) ? $portfolioCategory->image : 'admin/no-img/no-image.jpeg' )}}" alt="" style="height: 60px"></td>
                                        <td>{{ $portfolioCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.portfolio-categories.edit', $portfolioCategory->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.portfolio-categories.destroy', $portfolioCategory->id) }}" id="deleteItem" method="post">
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
