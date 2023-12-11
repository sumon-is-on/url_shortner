
<!doctype html>
<html lang="en">
<head>
<title>URL SHORTNER </title>
<meta charset="utf-8">
<link rel="stylesheet" href="{{ asset('css/min.css') }}">
<link rel="stylesheet" href="css/style.css">
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">URL SHORTNER</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Please Input an Url</h3>
                        <form action="{{ route('url.submit') }}" method="POST" class="signin-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="url" class="form-control" placeholder="url" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
