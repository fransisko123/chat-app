<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <title>ChatApp - @yield('title')</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Flat Able is trending dashboard template made using Bootstrap 5 design framework. Flat Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="phoenixcoded" />
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    {{-- Meta User ID --}}
    <meta name="user-id" content="{{ auth()->id() }}">

    <!-- [Google Font : Public Sans] icon -->
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&amp;display=swap"
      rel="stylesheet"
    />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <!-- [Template CSS Files] -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/css/style.css') }}"
      id="main-style-link"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" /></head
  ><!-- [Head] end --><!-- [Body] Start -->
  <body
    data-pc-preset="preset-1"
    data-pc-sidebar-theme="dark"
    data-pc-sidebar-caption="true"
    data-pc-direction="ltr"
    data-pc-theme="light"
  >
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="pc-loader"><div class="loader-fill"></div></div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Sidebar Menu ] start -->
    @include('layouts.sidebar')
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Header Topbar ] start -->
    @include('layouts.header')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    @yield('content')
    <!-- [ Main Content ] end -->

    @include('layouts.footer')

    @stack('scripts')
    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script>
      layout_change("light");
    </script>
    <script>
      layout_sidebar_change("dark");
    </script>
    <script>
      layout_header_change("dark");
    </script>
    <script>
      change_box_container("false");
    </script>
    <script>
      layout_caption_change("true");
    </script>
    <script>
      layout_rtl_change("false");
    </script>
    <script>
      preset_change("preset-1");
    </script>
    <!-- [Page Specific JS] start -->
    <script>
      // scroll-block
      var tc = document.querySelectorAll(".scroll-block");
      for (var t = 0; t < tc.length; t++) {
        new SimpleBar(tc[t]);
      }

      setTimeout(function () {
        // Jalankan hanya jika elemen .chat-content ada
        var chatContent = document.querySelector(".chat-content");
        if (!chatContent) return;

        var wrapper = chatContent.querySelector(".scroll-block .simplebar-content-wrapper");
        var content = chatContent.querySelector(".scroll-block .simplebar-content");

        if (wrapper && content) {
          var h = content.getBoundingClientRect().height;
          wrapper.scrollTop = h;
        }
      }, 100);
    </script>
    <!-- [Page Specific JS] end -->
    <div class="pct-c-btn">
      <a
        href="#"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvas_pc_layout"
        ><i class="ph-duotone ph-gear-six"></i
      ></a>
    </div>
    <div
      class="offcanvas border-0 pct-offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvas_pc_layout"
    >
      <div class="offcanvas-header justify-content-between">
        <h5 class="offcanvas-title">Settings</h5>
        <button
          type="button"
          class="btn btn-icon btn-link-danger"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        >
          <i class="ti ti-x"></i>
        </button>
      </div>
      <div class="pct-body" style="height: calc(100% - 85px)">
        <div class="offcanvas-body py-0">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="pc-dark">
                <h6 class="mb-1">Theme Mode</h6>
                <p class="text-muted text-sm">
                  Choose light or dark mode or Auto
                </p>
                <div class="row theme-color theme-layout">
                  <div class="col-4">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn active"
                        data-value="true"
                        onclick="layout_change('light');"
                      >
                        <span class="btn-label">Light</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn"
                        data-value="false"
                        onclick="layout_change('dark');"
                      >
                        <span class="btn-label">Dark</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn"
                        data-value="default"
                        onclick="layout_change_default();"
                        data-bs-toggle="tooltip"
                        title="Automatically sets the theme based on user's operating system's color scheme."
                      >
                        <span class="btn-label">Default</span>
                        <span
                          class="pc-lay-icon d-flex align-items-center justify-content-center"
                          ><i class="ph-duotone ph-cpu"></i
                        ></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Header Theme</h6>
              <p class="text-muted text-sm">Choose Header Theme</p>
              <div class="row theme-color theme-header-color">
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn active"
                      data-value="true"
                      onclick="layout_header_change('dark');"
                    >
                      <span class="btn-label">Dark</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn"
                      data-value="false"
                      onclick="layout_header_change('light');"
                    >
                      <span class="btn-label">Light</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Accent color</h6>
              <p class="text-muted text-sm">Choose your primary theme color</p>
              <div class="theme-color preset-color">
                <a href="#!" class="active" data-value="preset-1"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-2"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-3"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-4"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-5"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-6"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-7"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-8"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-9"
                  ><i class="ti ti-check"></i
                ></a>
                <a href="#!" data-value="preset-10"
                  ><i class="ti ti-check"></i
                ></a>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Sidebar Theme</h6>
              <p class="text-muted text-sm">Choose Sidebar Theme</p>
              <div class="row theme-color theme-sidebar-color">
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn"
                      data-value="true"
                      onclick="layout_sidebar_change('dark');"
                    >
                      <span class="btn-label">Dark</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn active"
                      data-value="false"
                      onclick="layout_sidebar_change('light');"
                    >
                      <span class="btn-label">Light</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span><span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <h6 class="mb-1">Sidebar Caption</h6>
              <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
              <div class="row theme-color theme-nav-caption">
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn active"
                      data-value="true"
                      onclick="layout_caption_change('true');"
                    >
                      <span class="btn-label">Caption Show</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span
                        ><span><span></span><span></span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="col-6">
                  <div class="d-grid">
                    <button
                      class="preset-btn btn"
                      data-value="false"
                      onclick="layout_caption_change('false');"
                    >
                      <span class="btn-label">Caption Hide</span>
                      <span class="pc-lay-icon"
                        ><span></span><span></span
                        ><span><span></span><span></span></span><span></span
                      ></span>
                    </button>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="pc-rtl">
                <h6 class="mb-1">Theme Layout</h6>
                <p class="text-muted text-sm">LTR/RTL</p>
                <div class="row theme-color theme-direction">
                  <div class="col-6">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn active"
                        data-value="false"
                        onclick="layout_rtl_change('false');"
                      >
                        <span class="btn-label">LTR</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn"
                        data-value="true"
                        onclick="layout_rtl_change('true');"
                      >
                        <span class="btn-label">RTL</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span><span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="pc-container-width">
                <h6 class="mb-1">Layout Width</h6>
                <p class="text-muted text-sm">
                  Choose Full or Container Layout
                </p>
                <div class="row theme-color theme-container">
                  <div class="col-6">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn active"
                        data-value="false"
                        onclick="change_box_container('false')"
                      >
                        <span class="btn-label">Full Width</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span
                          ><span><span></span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="d-grid">
                      <button
                        class="preset-btn btn"
                        data-value="true"
                        onclick="change_box_container('true')"
                      >
                        <span class="btn-label">Fixed Width</span>
                        <span class="pc-lay-icon"
                          ><span></span><span></span><span></span
                          ><span><span></span></span
                        ></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="d-grid">
                <button class="btn btn-light-danger" id="layoutreset">
                  Reset Layout
                </button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @vite('resources/js/app.js')
  </body>
  <!-- [Body] end -->
</html>