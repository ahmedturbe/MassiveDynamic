@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dear {{ $user['0']->name }}, you can see only yours data. </h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>User ID</th>
                                <th>e-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                  <td>{{ $user['0']->name }}</td>
                                  <td>{{ $user['0']->user_name }}</td>
                                  <td>{{ $user['0']->user_id }}</td>
                                  <td>{{ $user['0']->email }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
