@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>List all clients  </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('create') }}"><button class="btn btn-info" type="submit">Create Client</button></a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>User ID</th>

                                <th>Documents</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($users as $user)
                                <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->user_id }}</td>
                                  <td>
                                    @if ($user->file != null)
                                    <a href="{{ asset('storage/clientDocs/' . $user->file )}}" target="_blank"> View Documents </a>
                                    @else No File
                                    @endif
                                  </td>
                                  <td>
                                    @if ($user->role == 1)
                                        1 Admin
                                        @elseif ($user->role == 2)
                                        2 Secretary
                                        @else
                                        3 Client
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
