@extends('admin.master')

@section('title', 'Manage Portfolios')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Portfolios</h3>
                    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Author Name</td>
                                <td>Social Links</td>
                                <td>Short Description</td>
                                <td>Long Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $portfolio->title ?? '' }}</td>
                                        <td>{{ $portfolio->author_name ?? '' }}</td>
                                        <td>
                                            <span class="">Fb Link:{{ $portfolio->fb_link ?? '' }}</span><br />
                                            <span class="">Twitter Link:{{ $portfolio->twitter_link ?? '' }}</span><br />
                                            <span class="">Instagram Link:{{ $portfolio->instagram_link ?? '' }}</span><br />
                                            <span class="">Linked Link:{{ $portfolio->linkedin_link ?? '' }}</span><br />
                                        </td>
                                        <td>{!! str()->words(strip_tags($portfolio->short_description), 20, '...') !!}</td>
                                        <td>{!! str()->words(strip_tags($portfolio->long_description), 20, '...') !!}</td>
                                        <td><img src="{{ asset(!empty($portfolio->image) ? $portfolio->image : 'admin/no-img/no-image.jpeg' )}}" alt="" style="height: 60px"></td>
                                        <td>{{ $portfolio->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" id="deleteItem" method="post">
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
