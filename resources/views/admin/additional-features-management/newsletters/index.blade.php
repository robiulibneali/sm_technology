@extends('admin.master')

@section('title', 'Manage Newsletters')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Newsletters</h3>
{{--                    <a href="{{ route('admin.newsletters.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Email</td>
                                <td>Name</td>
                                <td>Mobile</td>
{{--                                <td>Status</td>--}}
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($newsletters as $newsletter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $newsletter->email ?? '' }}</td>
                                        <td>{{ $newsletter->name ?? '' }}</td>
                                        <td>{{ $newsletter->mobile ?? '' }}</td>
{{--                                        <td>{{ $newsletter->status == 1 ? 'Published' : 'Unpublished' }}</td>--}}
                                        <td class="d-flex">
{{--                                            <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>--}}
                                            <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" id="deleteItem" method="post">
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
