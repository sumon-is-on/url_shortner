
<!doctype html>
<html lang="en">
<head>
    <title>url_shortner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <h4 class="text-center mb-4">Enter an Url to make it short</h4>
                        <form action="{{ route('url.submit') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="url" class="form-control rounded-left" placeholder="Url" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @if (auth()->user())
                                        <div class="col-md-4">
                                            <button type="submit" class="form-control btn btn-success rounded submit px-3">Submit</button>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ route('user.logout') }}">
                                                        <button type="button" class="form-control btn btn-warning rounded submit ">Logout</button>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ route('user.profile') }}">
                                                        <button type="button" class="form-control btn btn-info rounded submit ">Profile</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-4">
                                            <button type="submit" class="form-control btn btn-success rounded submit px-3">Submit</button>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('user.login') }}">
                                                <button type="button" class="form-control btn btn-warning rounded submit px-3">Login</button>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
