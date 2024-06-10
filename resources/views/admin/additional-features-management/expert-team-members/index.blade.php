@extends('admin.master')

@section('title', 'Manage Expert Team Members')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Expert Team Members</h3>
                    <a href="{{ route('admin.expert-team-members.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Position</td>
                                <td>Social Link</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expertTeamMembers as $expertTeamMember)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expertTeamMember->name ?? '' }}</td>
                                    <td>{{ $expertTeamMember->position ?? '' }}</td>
                                    <td>
                                        <span>Facebook: {{ $expertTeamMember->fb_link ?? '' }}</span><br />
                                        <span>X: {{ $expertTeamMember->x_link ?? '' }}</span><br />
                                        <span>Twitter: {{ $expertTeamMember->twitter_link ?? '' }}</span><br />
                                        <span>Linkedin: {{ $expertTeamMember->linkedin_link ?? '' }}</span><br />
                                    </td>
                                    <td>{!! str()->words(strip_tags($expertTeamMember->description), 20, '...') !!}</td>
                                    <td><img src="{{ asset(!empty($expertTeamMember->image) ? $expertTeamMember->image : 'admin/no-img/no-image.jpeg') }}" alt="" style="height: 60px" /></td>
                                    <td>{{ $expertTeamMember->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.expert-team-members.edit', $expertTeamMember->id) }}" class="btn btn-sm btn-secondary ms-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.expert-team-members.destroy', $expertTeamMember->id) }}" id="deleteItem" method="post">
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
