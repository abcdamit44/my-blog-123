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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        {{-- @if ($errors)
                                            @foreach ($errors as $error)
                                                <p class="text-danger">{{ $error }}</p>
                                            @endforeach
                                        @endif --}}

                                        @if (Session::has('error'))
                                            <p class="text-danger">{{ session('error') }}</p>
                                        @endif

                                        <form method="post">
                                            @csrf
                                            {{-- <div class="mb-3">
                                              <label for="username" class="form-label">Username</label>
                                              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                                              @error('username')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div> --}}
                                            <div class="mb-3">
                                              <label for="email" class="form-label">email</label>
                                              <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                              @error('email')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>
                                            <div class="mb-3">
                                              <label for="exampleInputPassword1" class="form-label">Password</label>
                                              <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                              @error('password')
                                                  <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            </div>
                                            <div class="mb-3 form-check">
                                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ url("admin/register ") }}">Need an account? Sign up!</a></div>
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
