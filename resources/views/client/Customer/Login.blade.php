@extends('client.layoutClient')
@section('content')
    <style>
        .card {
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 2.5rem;
            font-weight: 500;
            color: #007bff;
        }

        .form-group label {
            font-weight: 500;
        }

        .form-control {
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .form-check-input {
            margin-top: 3px;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>

    <div class="mt-5 mb-5 container">

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="mt-5 card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-light" role="alert">
                                {{ session('success') }}
                            </div>
                        @else
                        @endif
                        <h1 class="card-title text-center">Login</h1>
                        <form method="post" action="{{ route('customer.login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="ml-3 form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                        <a class="mt-3 form-control" href="{{ route('customer.register') }}">
                            New customer registration</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
