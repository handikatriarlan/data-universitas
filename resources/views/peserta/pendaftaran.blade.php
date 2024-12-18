<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 05:00:01 GMT -->
    <head>
        <title>Customer Adavance Gathering Medan - {{ $pageTitle }} </title>
        <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="#">
        <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
        <meta name="author" content="#">
        <link rel="icon" href="{{ asset('template_assets/assets/images/favicon.ico" type="image/x-icon') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('template_assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template_assets/assets/icon/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template_assets/assets/icon/icofont/css/icofont.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template_assets/assets/css/style.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="public-path" content="{{ public_path() }}">
        <style>
            .container-1 {
                display: none;
                position: relative;
                width: 100%;
            }

            .logo {
                width: 100%;
                height: auto;
            }

            .qr-code {
                position: absolute;
                top: 37%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 170px;
                height: 170px;
            }

            .child-container-1 {
                position: absolute;
                top: 63%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>
    <body class="fix-menu">
        <div class="theme-loader">
            <div class="ball-scale">
                <div class="contain">
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                    <div class="ring">
                        <div class="frame"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="login-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="md-float-material form-material">
                            <div class="text-center">
                                <a href="/">
                                    <img src="{{ asset('own_assets/images/logo.png') }}" alt="logo.png" width="300px">
                                </a>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="container-1">
                                        <img src="{{ asset('own_assets/images/id_card.jpg') }}" width="100%" alt="" class="logo">
                                        <img id="qr_code" class="qr-code">
                                        <div class="child-container-1">
                                            <h4 id="nama_peserta" class="text-center" style="margin-top:-20px"></h4>
                                            {{-- <hr style="margin-top: -10px"> --}}
                                            {{-- <h4 id="nama_toko" style="margin-top: -10px" class="d-flex justify-content-center"></h4> --}}
                                        </div>
                                    </div>
                                    <div class="container-2">
                                        <div class="row m-b-20">
                                            <div class="col-md-12">
                                                <h3 class="text-center">Pendaftaran</h3>
                                            </div>
                                        </div>
                                        <div class="form-group form-primary">
                                            <label for="nama" class="form-label">Nama 1 :</label>
                                            <input type="text" id="nama" name="nama" class="form-control" required placeholder="Masukkan Nama 1" required>
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="form-group form-primary">
                                            <label for="pendamping" class="form-label">Nama 2 :</label>
                                            <input type="text" id="pendamping" name="pendamping" class="form-control" required placeholder="Masukkan Nama 2" required>
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="form-group form-primary">
                                            <label for="toko" class="form-label">Nama Toko :</label>
                                            <input type="text" id="toko" name="toko" class="form-control" required placeholder="Masukkan Nama Toko" required>
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="form-group form-primary">
                                            <label for="wa" class="form-label">Nomor Whatsapp :</label>
                                            <input type="text" id="wa" name="wa" class="form-control" required placeholder="Masukkan Nomor Whatsapp" required oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="form-group form-primary">
                                            <label for="email" class="form-label">Email :</label>
                                            <input type="email" id="email" name="email" class="form-control" required placeholder="Masukkan Email" required>
                                            <span class="form-bar"></span>
                                        </div>

                                        <div class="row m-t-30">
                                            <div class="col-md-12">
                                                <button type="button" id="store" style="background-color: red" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Daftar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-inverse text-left m-b-0">Terimakasih</p>
                                            <div id="qrcode-2" style="display: none"></div>
                                            <p class="text-inverse text-left">
                                                <a href="/">
                                                    <b class="f-w-600">Back to website</b>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset('own_assets/images/logo.png') }}" alt="small-logo.png" width="150px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--[if lt IE 10]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
                <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                                    <div>Firefox</div>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.opera.com">
                                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                                        <div>Opera</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.apple.com/safari/">
                                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                                            <div>Safari</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                            <img src="../files/assets/images/browser/ie.png" alt="">
                                                <div>IE (9 & above)</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p>Sorry for the inconvenience!</p>
                            </div>
                        <![endif]-->
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/modernizr/modernizr.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/modernizr/feature-detects/css-scrollbars.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/i18next/i18next.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/bower_components/jquery-i18next/jquery-i18next.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('template_assets/assets/js/common-pages.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
        <script src="{{ asset('own_assets/scripts/html2canvas.min.js') }}"></script>
        <script src="{{ asset('own_assets/scripts/pages/peserta.js') }}"></script>
    </body>
    <!-- Mirrored from demo.dashboardpack.com/adminty-html/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 05:00:01 GMT -->
</html>
