<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>BasitCRM | @yield("title")</title>
    <!-- CSS files -->
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="{{env('APP_ASSET_URL')}}/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }

      .form-group{
        padding:5px
      }
      label{
        margin-bottom:3px
      }
    </style>
  </head>
  <body >
    <script src="{{env('APP_ASSET_URL')}}/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
      <!-- Navbar -->
      @include("admin.partials.topmenu")
      @include("admin.partials.menu")
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  @yield("pagetitle")
                </div>
                <h2 class="page-title">
                  @yield("pagesubtitle")
                </h2>
              </div>
             @yield("pageaction")
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            @yield("content")
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Sponsor
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2024
                    <a href="." class="link-secondary">Tombala</a>.
                    Tüm Hakları Saklıdır.
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

    @include("admin.partials.script")
  </body>
</html>
