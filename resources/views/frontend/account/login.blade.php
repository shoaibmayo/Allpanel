<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/image/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" /> --}}
    <style>
        .bn:hover {
            opacity: 0.8;
        }

        .bn {
            background-color: #2d3387;
            color: white;
            font-weight: 550;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border: none;
            border-radius: 5px;
        }

        .bn:hover {
            background-color: #f8f9fa;
            color: blue;
        }
    </style>
</head>

<body style="background-color:#2d3387;">
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('frontend/image/logo.png') }}" alt="" width="220px"
                                    height="70px">
                            </a>
                        </div>
                        <div class="card mb-2">
                            @include('frontend.message')
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                </div>
                                <form action="{{ route('front.checklogin') }}" method="post" class="row g-3 ">
                                    @csrf
                                    <div class="col-12">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" id="email" placeholder="Email">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="Password">
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="bn w-100 mb-3 " type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>

</body>

</html>
