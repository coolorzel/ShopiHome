<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('app/assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('app/assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('app/assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('app/assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('app/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('app/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('app/css/pixel.css') }}" rel="stylesheet">
</head>
<body>
<header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-dark">
        <div class="container position-relative">
            <a class="navbar-brand me-lg-5" href="./index.html">
                <img class="navbar-brand-dark" src="./app/assets/img/brand/light.svg" alt="Logo light">
                <img class="navbar-brand-light" src="./app/assets/img/brand/dark.svg" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse me-auto" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="./app/assets/img/brand/dark.svg" alt="Themesberg logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="frontPagesDropdown" aria-expanded="false" data-bs-toggle="dropdown">
                            Pages
                            <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                        </a>
                        <div class="dropdown-menu dropdown-megamenu px-0 py-2 p-lg-4" aria-labelledby="frontPagesDropdown">
                            <div class="row">
                                <div class="col-6 col-lg-4">
                                    <h6 class="d-block mb-3 text-primary">Main pages</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/about.html">About</a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/contact.html">Contact</a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/pricing.html" target="_blank">Pricing <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/team.html" target="_blank">Team <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/services.html" target="_blank">Services <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/profile.html" target="_blank">Profile <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block text-primary">Legal</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/legal.html" target="_blank">Legal center <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/terms.html" target="_blank">Terms <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block text-primary">Career</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/careers.html" target="_blank">Careers <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/career-single.html" target="_blank">Career Single <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <h6 class="d-block mb-3 text-primary">Landings</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/landing-freelancer.html">Freelancer</a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/landing-app.html" target="_blank">App <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/landing-crypto.html" target="_blank">Crypto <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block mb-3 text-primary">Support</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/support.html" target="_blank">Support center <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/support-topic.html" target="_blank">Support topic <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block mb-3 text-primary">Blog</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/blog.html" target="_blank">Blog <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/blog-post.html" target="_blank">Blog post <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6 col-lg-4">
                                    <h6 class="d-block mb-3 text-primary">User</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/sign-in.html">Sign in</a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/sign-up.html">Sign up</a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/forgot-password.html" target="_blank">Forgot password <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/reset-password.html" target="_blank">Reset password <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block mb-3 text-primary">Special</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/404.html" target="_blank">404 Not Found <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/500.html" target="_blank">500 Server Error <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/maintenance.html" target="_blank">Maintenance <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/pages/coming-soon.html" target="_blank">Coming soon <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="./html/pages/blank.html">Blank page</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dashboardDropdown" aria-expanded="false" data-bs-toggle="dropdown">
                            Dashboard
                            <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                        </a>
                        <div class="dropdown-menu dropdown-megamenu-sm px-0 py-2 p-lg-4" aria-labelledby="dashboardDropdown">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="d-block mb-3 text-primary">User dashboard</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/account.html" target="_blank">My account <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/settings.html" target="_blank">Settings <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/security.html" target="_blank">Security <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block mb-3 text-primary">Items</h6>
                                    <ul class="list-style-none">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/my-items.html" target="_blank">My items <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/edit-item.html" target="_blank">Edit item <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <h6 class="d-block mb-3 text-primary">Messaging</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/messages.html" target="_blank">Messages <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/single-message.html" target="_blank">Chat <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                    <h6 class="d-block mb-3 text-primary">Billing</h6>
                                    <ul class="list-style-none mb-4">
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/billing.html" target="_blank">Billing details <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                        <li class="mb-2 megamenu-item">
                                            <a class="megamenu-link" href="https://demo.themesberg.com/pixel-pro/v5/html/dashboard/invoice.html" target="_blank">Invoice <span class="badge bg-tertiary">Pro</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="componentsDropdown" aria-expanded="false" data-bs-toggle="dropdown">
                            Components
                            <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                        </a>
                        <div class="dropdown-menu dropdown-megamenu-md p-0" aria-labelledby="componentsDropdown">
                            <div class="row g-0">
                                <div class="col-lg-6 bg-dark d-none d-lg-block me-0 me-3">
                                    <div class="px-0 py-3 text-center">
                                        <img src="./assets/img/megamenu_image.png" alt="Pixel Components">
                                    </div>
                                </div>
                                <div class="col ps-0 py-3">
                                    <ul class="list-style-none">
                                        <li><a class="dropdown-item" href="./html/components/accordions.html">Accordions</a></li>
                                        <li><a class="dropdown-item" href="./html/components/alerts.html">Alerts</a></li>
                                        <li><a class="dropdown-item" href="./html/components/badges.html">Badges</a></li>
                                        <li><a class="dropdown-item" href="./html/components/cards.html">Cards</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/charts.html" target="_blank">Charts <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/bootstrap-carousels.html">Carousels</a></li>
                                        <li><a class="dropdown-item" href="./html/components/breadcrumbs.html">Breadcrumbs</a></li>
                                        <li><a class="dropdown-item" href="./html/components/buttons.html">Buttons</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/counters.html" target="_blank">Counters <span class="badge bg-tertiary">Pro</span></a></li>
                                    </ul>
                                </div>
                                <div class="col ps-0 py-3">
                                    <ul class="list-style-none">
                                        <li><a class="dropdown-item" href="./html/components/dropdowns.html">Dropdowns</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/e-commerce.html" target="_blank">E-commerce <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/forms.html">Forms</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/icon-boxes.html" target="_blank">Icon Boxes <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/modals.html">Modals</a></li>
                                        <li><a class="dropdown-item" href="./html/components/navs.html">Navs</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/glidejs-carousels.html" target="_blank">GlideJS <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/pagination.html">Pagination</a></li>
                                        <li><a class="dropdown-item" href="./html/components/popovers.html">Popovers</a></li>
                                    </ul>
                                </div>
                                <div class="col ps-0 py-3">
                                    <ul class="list-style-none">
                                        <li><a class="dropdown-item" href="./html/components/progress-bars.html">Progress Bars</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/steps.html" target="_blank">Steps <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/tables.html">Tables</a></li>
                                        <li><a class="dropdown-item" href="./html/components/tabs.html">Tabs</a> </li>
                                        <li><a class="dropdown-item" href="./html/components/toasts.html">Toasts</a> </li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/timelines.html" target="_blank">Timelines <span class="badge bg-tertiary">Pro</span></a></li>
                                        <li><a class="dropdown-item" href="./html/components/tooltips.html">Tooltips</a></li>
                                        <li><a class="dropdown-item" href="./html/components/typography.html">Typography</a></li>
                                        <li><a class="dropdown-item" href="https://demo.themesberg.com/pixel-pro/v5/html/components/widgets.html" target="_blank">Widgets <span class="badge bg-tertiary">Pro</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="supportDropdown" aria-expanded="false">
                            Support
                            <span class="fas fa-angle-down nav-link-arrow ms-1"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg" aria-labelledby="supportDropdown">
                            <div class="col-auto px-0">
                                <div class="list-group list-group-flush">
                                    <a href="https://themesberg.com/docs/bootstrap-5/pixel/getting-started/quick-start/" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                        <span class="icon icon-sm"><span class="fas fa-file-alt"></span></span>
                                        <div class="ms-4">
                                            <span class="d-block font-small fw-bold mb-0">Documentation<span class="badge badge-sm badge-secondary ms-2">v3.1</span></span>
                                            <span class="small">Examples and guides</span>
                                        </div>
                                    </a>
                                    <a href="https://github.com/themesberg/pixel-bootstrap-ui-kit/issues" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                        <span class="icon icon-sm"><span class="fas fa-microphone-alt"></span></span>
                                        <div class="ms-4">
                                            <span class="d-block font-small fw-bold mb-0">Support</span>
                                            <span class="small">Need help? Ask us!</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <a href="https://themesberg.com/docs/bootstrap-5/pixel/getting-started/quick-start/" target="_blank" class="btn btn-outline-gray-100 d-none d-lg-inline me-md-3"><span class="fas fa-book me-2"></span> Docs</a>
                <a href="https://themesberg.com/product/ui-kit/pixel-free-bootstrap-5-ui-kit" target="_blank" class="btn btn-tertiary"><i class="fas fa-cloud-download-alt me-2"></i> Download</a>
                <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
<main>

    <div class="preloader bg-dark flex-column justify-content-center align-items-center">
        <svg id="loader-logo" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 64 78.4">
            <path fill="#fff" d="M10,0h1.2V11.2H0V10A10,10,0,0,1,10,0Z"/>
            <rect fill="none" stroke="#fff" stroke-width="11.2" x="40" y="17.6" width="0" height="25.6"/>
            <rect fill="none" stroke="#fff" stroke-opacity="0.4" stroke-width="11.2" x="23" y="35.2" width="0" height="25.6"/>
            <path fill="#fff" d="M52.8,35.2H64V53.8a7,7,0,0,1-7,7H52.8V35.2Z"/>
            <rect fill="none" stroke="#fff" stroke-width="11.2" x="6" y="52.8" width="0" height="25.6"/>
            <path fill="#fff" d="M52.8,0H57a7,7,0,0,1,7,7h0v4.2H52.8V0Z"/>
            <rect fill="none" stroke="#fff" stroke-opacity="0.4" stroke-width="11.2" x="57.8" y="17.6" width="0" height="11.2"/>
            <rect fill="none" stroke="#fff" stroke-width="11.2" x="6" y="35.2" width="0" height="11.2"/>
            <rect fill="none" stroke="#fff" stroke-width="11.2" x="40.2" y="49.6" width="0" height="11.2"/>
            <path fill="#fff" d="M17.6,67.2H28.8v1.2a10,10,0,0,1-10,10H17.6V67.2Z"/>
            <rect fill="none" stroke="#fff" stroke-opacity="0.4" stroke-width="28.8" x="31.6" width="0" height="11.2"/>
            <rect fill="none" stroke="#fff" x="14" stroke-width="28.8" y="17.6" width="0" height="11.2"/>
        </svg>
    </div>

    <!-- Hero -->
    <section class="section-header overflow-hidden pt-7 pt-lg-8 pb-9 pb-lg-12 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="bootstrap-big-icon d-none d-lg-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="700" height="622" class="d-block my-1"
                             viewBox="0 0 118 94" role="img">
                            <title>Bootstrap</title>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"
                                  fill="currentColor"></path>
                        </svg>
                    </div>
                    <h1 class="fw-bolder display-2">Pixel UI Kit</h1>
                    <h2 class="lead fw-normal text-muted mb-4 px-lg-10">Free Bootstrap 5 UI Kit without jQuery that
                        will help you prototype and design beautiful, creative and modern websites</h2>
                    <!-- Button Modal -->
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <a href="#components" class="btn btn-tertiary mb-3 mt-2 me-2 me-md-3 animate-up-2"><span
                                class="fas fa-th-large me-2"></span> <span class="d-none d-md-inline">Explore
                                    components</span> <span class="d-md-none">Components</span></a>
                        <a class="github-button" href="https://github.com/themesberg/pixel-bootstrap-ui-kit"
                           data-color-scheme="no-preference: dark; light: light; dark: light;"
                           data-icon="octicon-star" data-size="large" data-show-count="true"
                           aria-label="Star themesberg/pixel-bootstrap-ui-kit on GitHub">Star</a>
                    </div>
                    <div class="d-flex justify-content-center flex-column mb-6 mb-lg-5">
                        <a href="https://themesberg.com" class="d-block text-center mx-auto" target="_blank">
                            <img src="./assets/img/themesberg.svg" class="d-block mx-auto mb-3" height="25"
                                 width="25" alt="Themesberg Logo">
                            <span class="text-muted font-small">A Themesberg production</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <figure class="position-absolute bottom-0 left-0 w-100 d-none d-md-block mb-n2"><svg class="fill-white"
                                                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path d="M3000,0v185.4H0V0c496.4,115.6,996.4,173.4,1500,173.4S2503.6,115.6,3000,0z"></path>
            </svg></figure>
    </section>

</main>


<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a>ACP</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Core -->
<script src="{{ asset('app/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('app/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('app/vendor/headroom.js/dist/headroom.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('app/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
<script src="{{ asset('app/vendor/jarallax/dist/jarallax.min.js') }}"></script>
<script src="{{ asset('app/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('app/vendor/vivus/dist/vivus.min.js') }}"></script>
<script src="{{ asset('app/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Pixel JS -->
<script src="{{ asset('app/assets/js/pixel.js') }}"></script>
</body>
</html>
