
<!doctype html>
<html lang="en">
<head>
    <title>url_shortner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <h4 class="text-center mb-4">Registration</h4>
                        <form action="{{ route('user.registration.post') }}" method="POST" class="login-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control rounded-left" placeholder="Yourname" required>
                                <p class="text-danger">@error('name')
                                    {{ $message }}
                                    @enderror</p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
                                <p class="text-danger">@error('email')
                                    {{ $message }}
                                    @enderror</p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control rounded-left" placeholder="Contact Number" required>
                                <p class="text-danger">@error('phone')
                                    {{ $message }}
                                    @enderror</p>
                            </div>
                            <div class="form-group">
                                <label for="image" class="block mb-2  font-medium text-gray-900 dark:text-white">Image</label>
                                <input type="file" name="image" id="image" aria-describedby="image-explanation">
                                <p class="text-danger">@error('image')
                                    {{ $message }}
                                    @enderror</p>
                            </div>
                            <div class="form-group">
                                <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-white">Registration AS:</label>
                                <select name="role_id" id="role_id" class="form-control">
                                  @foreach ($roles as $role)
                                  <option
                                   name="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach
                              </select>
                              <p class="text-danger">@error('role_id')
                                {{ $message }}
                                @enderror</p>
                           </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                                <p class="text-danger">@error('password')
                                    {{ $message }}
                                    @enderror</p>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('url.create') }}">
                                            <button type="button" class="form-control btn btn-warning rounded submit px-3">Back</button>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
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
