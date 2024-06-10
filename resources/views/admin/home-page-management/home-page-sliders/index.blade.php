@extends('admin.master')

@section('title', 'Manage Home Page Sliders')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Home Page Sliders</h3>
                    <a href="{{ route('admin.home-page-sliders.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Service Link</td>
                                <td>Note</td>
                                <td>Slider Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($homePageSliders as $homePageSlider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $homePageSlider->title ?? '' }}</td>
                                        <td>{{ $homePageSlider->service_link ?? '' }}</td>
                                        <td>{!! str()->words(strip_tags($homePageSlider->note), 20, '...') !!}</td>
                                        <td><img src="{{ asset(!empty($homePageSlider->slider_image) ? $homePageSlider->slider_image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                        <td>{{ $homePageSlider->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.home-page-sliders.edit', $homePageSlider->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.home-page-sliders.destroy', $homePageSlider->id) }}" id="deleteItem" method="post">
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
