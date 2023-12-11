<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>
<body>
    <div style="margin-top: 100px;">
        <h4 class="text-center mb-4">Profile</h4>
    </div>
    <div class="mt-4">
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <div class="image d-flex flex-column justify-content-center align-items-center">
                    {{-- <img src="#"  class="rounded-circle mb-4" height="100" width="100"> --}}
                    <img src="{{ url('/users/' . $user->image) }}" class="rounded-circle mb-4" height="100" width="100" alt="{{ $user->name }}">
                    <span class="name">{{ $user->name }}</span>
                    <span class="idd">{{ $user->email }}</span>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                        <span class="idd1">{{ $user->phone }}</span>
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <h4>Your Url List({{ count($urls) }})</h4>
                    </div>
                </div>
                @foreach ($urls as $url)
                    <section class="content mt-5">
                        <div class="container-fluid">
                            <div class="row border round">
                                <div class=" col-12">
                                    <div class="small-box ">
                                        <div class="inner">
                                            <a href="{{ $url->original_url }}">
                                                <p> <b>Original url:</b> <span>{{ strlen($url->original_url) > 30 ? substr($url->original_url, 0, 30) . '...' : $url->original_url }}</span> </p>
                                            </a>
                                            <a href="{{ route('url.pathParamter', ['pathParamter' => $url->short_url]) }}">
                                                <p><b>Short url:</b> <span>{{ env('APP_URL').'/'.$url->short_url }}</span></p>
                                            </a>
                                            <b>Click count:</b> <span>{{ $url->click_count }}</span> <br>
                                            <b>Url created:</b> <span>{{ $url->created_at->format('d-m-Y  H:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach

                <div class="d-flex mt-2">
                    <a href="{{ route('url.create') }}">
                        <button class="btn1 btn-warning rounded">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>
</html>
