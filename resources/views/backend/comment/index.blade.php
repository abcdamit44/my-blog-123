@extends('layouts.admin')

@section('title')
  All Comments
@endsection

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Comments</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <i class="fas fa-table me-1"></i>
                                All Comments
                              
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td>@if (!empty($comment->user_id))
                                                {{ $comment->user->email}}
                                            @endif
                                            </td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>
                                                <a href="{{ url('admin/comment/'.$comment->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
@endsection
      