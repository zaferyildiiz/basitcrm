<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>BasitCRM | Giriş</title>
    <!-- CSS files -->
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/css/demo.min.css?1684106062" rel="stylesheet"/>
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
    <script src="{{env('APP_ASSET_URL')}}/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4" style="font-weight: bold;font-size:25px">

            BasitCRM
         </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Giriş Yap</h2>
            <form action="{{ route("panel.login_post") }}" method="post" autocomplete="off">
                @csrf
              <div class="mb-3">
                <label class="form-label">Eposta Adresi</label>
                <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Şifre
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" name="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                  <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                </div>
              </div>

              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>


        </div>

      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{env('APP_ASSET_URL')}}/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="{{env('APP_ASSET_URL')}}/dist/js/demo.min.js?1684106062" defer></script>
  </body>
</html>
