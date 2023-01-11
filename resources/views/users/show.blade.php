@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>View clients details {{ $user['0']->name }}</h3>
                    <ol>
                        <li>Admin - all operations CRUD Here Create</li>
                        <li>Sekretar - only create and view</li>
                        <li>Client - view only its data without documents</li>
                    </ol>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>User ID</th>
                                <th>Role</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                  <td>{{ $user['0']->id }}</td>
                                  <td>{{ $user['0']->name }}</td>
                                  <td>{{ $user['0']->user_id }}</td>
                                  <td>{{ $user['0']->role }}</td>
                                  <td>
                                    @isset($user['0']->file)
                                    <a href="{{ asset('storage/clientDocs/' . $user['0']->file )}}" target="_blank"> View Documents </a>
                                    @endisset

                                </td>
                                  <td>UD</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
