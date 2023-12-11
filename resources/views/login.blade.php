<!doctype html>
<html lang="en">

<head>
    <title>url_shortner</title>
    <meta charset="utf-8">
    {{--
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <h4 class="text-center mb-4">Login</h4>
                        <form action="{{ route('user.login.post') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Email"
                                    required>
                            </div>
                            <p class="text-danger">@error('email')
                                {{ $message }}
                                @enderror</p>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left"
                                    placeholder="Password" required>
                                    <p class="text-danger">@error('password')
                                        {{ $message }}
                                        @enderror</p>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('url.create') }}">
                                            <button type="button"
                                                class="form-control btn btn-danger rounded submit ">back</button>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('user.registration') }}">
                                            <button type="button"
                                                class="form-control btn btn-warning rounded submit ">Reg:</button>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit"
                                            class="form-control btn btn-success rounded submit ">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
