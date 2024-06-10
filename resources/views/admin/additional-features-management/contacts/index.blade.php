@extends('admin.master')

@section('title', 'Manage Contacts')

@section('body')
    <div class="row py-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="">Manage Contacts</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Subject</td>
                                <td>Mobile</td>
                                <td>Message</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name ?? '' }}</td>
                                        <td>{{ $contact->email ?? '' }}</td>
                                        <td>{{ $contact->subject ?? '' }}</td>
                                        <td>{{ $contact->mobile ?? '' }}</td>
                                        <td>{{ $contact->message ?? '' }}</td>
{{--                                        <td>{{ $contact->status == 1 ? 'Published' : 'Unpublished' }}</td>--}}
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
