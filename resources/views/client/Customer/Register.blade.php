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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="mt-5 mb-5 card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Register</h1>
                        <form method="post" action="{{ route('customer.add') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone number</label>
                                <input name="phone_number" type="text" class="form-control" id="phone_number"
                                    placeholder="Enter your phone number">
                            </div>
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
                            <div class="form-group">
                                <label for="confirmPassword">Confirm password</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Confirm password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const password = document.getElementById('password');
        const confirm_password = document.getElementById('confirmPassword');

        confirm_password.addEventListener('input', () => {
            if (password.value !== confirm_password.value) {
                confirm_password.setCustomValidity('Passwords do not match');
            } else {
                confirm_password.setCustomValidity('');
            }
        });
    </script>
@endsection
