@extends('admin.master')

@section('title', 'Manage Client Feedbacks')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Client Feedbacks</h3>
                    <a href="{{ route('admin.client-feedbacks.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Client Name</td>
                                <td>Client Country</td>
                                <td>Feedback</td>
                                <td>Total Rating</td>
                                <td>User Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($clientFeedbacks as $clientFeedback)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $clientFeedback->client_name ?? '' }}</td>
                                        <td>{{ $clientFeedback->client_country ?? '' }}</td>
                                        <td>{!! str()->words(strip_tags($clientFeedback->feedback), 20, '...') !!}</td>
                                        <td>{{ $clientFeedback->total_rating ?? '' }}</td>
                                        <td><img src="{{ asset(!empty($clientFeedback->user_image) ? $clientFeedback->user_image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                        <td>{{ $clientFeedback->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.client-feedbacks.edit', $clientFeedback->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.client-feedbacks.destroy', $clientFeedback->id) }}" id="deleteItem" method="post">
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
