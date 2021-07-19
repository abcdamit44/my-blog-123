@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <i class="fas fa-table me-1"></i>
                                Category Data
                                <a href="{{ url('admin/category/create') }}" class="btn btn-dark btn-sm ">Add Data</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $cat)
                                        <tr>
                                            <td>{{ $cat->id }}</td>
                                            <td>{{ $cat->title }}</td>
                                            <td>{{ $cat->details }}</td>
                                            <td><img src="{{ asset('images'.'/'.$cat->image) }}" alt="Image" width="100"></td>
                                            <td>
                                                <a href="{{ url('admin/category/'.$cat->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                                                <a href="{{ url('admin/category/'.$cat->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
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
      