
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Log In Admin - CMS</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>

    <link href="{{ asset('dist/css/tabler.min.css?1685973381') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-flags.min.css?1685973381') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-payments.min.css?1685973381') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/tabler-vendors.min.css?1685973381') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/demo.min.css?1685973381') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/css/login-admin.css') }}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1685973381"></script>
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img src="../../assets/img/logo-sikap.png" width="200" style="margin-top: -25px;" alt=""></a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="fs-1 fw-bolder text-center mb-0">Login Admin</h2>
                                <p class="fs-4 text-secondary text-center">Presensi dan Cuti Dalam Satu Genggaman</p>
                                @if (Session::get('warning'))
                                <div class="alert alert-warning">
                                    <p>{{ Session::get('warning') }}</p>
                                </div>                                    
                                @endif
                                <form action="/prosesloginadmin" method="post" autocomplete="off" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                    <input type="email"  name='email' class="form-control" placeholder="Email" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                    <div class="input-group input-group-flat">
                                        <input type="password" name='password' class="form-control"  placeholder="Password"  autocomplete="off">
                                        <span class="input-group-text">
                                        <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                            <img src=""
                                        </a>
                                        </span>
                                    </div>
                                    </div>
                                    <div class="form-footer">
                                    <button type="submit" class="rounded-2 w-100 fw-bold">LOGIN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js?1685973381') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1685973381') }}" defer></script>
  </body>
</html>