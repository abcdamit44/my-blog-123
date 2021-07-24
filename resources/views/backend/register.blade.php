{{-- @extends('layouts.admin') --}}

{{-- @section('title')
    Admin Login
@endsection --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Blog | Admin Login</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
{{-- @section('content') --}}

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-1">Login</h3></div>
                                    <div class="card-body">
                                        @if ($errors)
                                            @foreach ($errors as $error)
                                                <p class="text-danger">{{ $error }}</p>
                                            @endforeach
                                        @endif

                                        @if (Session::has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif

                                        <form method="post">
                                            @csrf
                                            <div class="row">

                                            <div class="mb-3 col">
                                              <label for="name" class="form-label">Name</label>
                                              <input type="text" class="form-control" id="name" name="name" class="@error('name')
                                              border-red
                                          @enderror" value="{{  old('name')  }}">
                                              @error('name')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>


                                            <div class="mb-3 col">
                                              <label for="email" class="form-label">Email</label>
                                              <input type="text" class="form-control" name="email" class="@error('email')
                                              border-red
                                            @enderror" value="{{  old('email')  }}">
                                              @error('email')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>
                                        </div>

                                        <div class="row">

                                        
                                            <div class="mb-3 col">
                                              <label for="role" class="form-label">Role</label>
                                            <select name="role" class="form-select  ">
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                              @error('role')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>
                                            
                                            <div class="mb-3 col">
                                              <label for="exampleInputPassword1" class="form-label">Password</label>
                                              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                              @error('password')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1"  class="@error('password_confirmation')
                                                border-red
                                            @enderror" value="{{  old('password_confirmation')  }}">
                                                @error('password_confirmation')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                              </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                    <div class="card-footer text-center py-2 my-2">
                                        <div class="small"><a href="{{ url("admin/login") }}">Already an account? Sign In!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
{{-- @endsection --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('backend') }}/js/scripts.js"></script>
</body>
</html>
