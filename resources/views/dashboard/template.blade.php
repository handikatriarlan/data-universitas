<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 05:00:04 GMT -->

<head>
    @include('dashboard.head')
</head>

<body>
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
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            {{-- header --}}
            <nav class="navbar header-navbar pcoded-header" style="background-color: #404e67;">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="/dashboard">
                            <img style="margin-left: 80px; background-color: rgb(255, 255, 255); padding: 5px; border-radius: 5px;"
                                class="img-fluid" src="{{ asset('own_assets/images/logo.png') }}" alt="Theme-Logo"
                                width="50px" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container">
                        <ul class="nav-left">
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i style="color: white" class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ session('user')->foto ? asset('file_upload/user_image') . '/' . session('user')->foto : asset('own_assets/images/user.png') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span style="color: white">{{ session('user')->name }}</span>
                                        <i style="color: white" class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <div id="logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- end header --}}

            {{-- <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text"
                                            placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online"
                                    data-username="Josephin Doe" data-toggle="tooltip" data-placement="left"
                                    title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{ asset('ssets/assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online"
                                    data-username="Lary Doe" data-toggle="tooltip" data-placement="left"
                                    title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online"
                                    data-username="Alice" data-toggle="tooltip" data-placement="left"
                                    title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/assets/images/avatar-4.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online"
                                    data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online"
                                    data-username="Suzen" data-toggle="tooltip" data-placement="left"
                                    title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5"
                            src="{{ asset('assets/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class>
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?
                            </p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class>
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?
                            </p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('assets/assets/images/avatar-4.jpg') }}"
                                alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        @include('dashboard.sidebar')
                    </nav>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
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

    @include('dashboard.scripts')
</body>
<!-- Mirrored from demo.dashboardpack.com/adminty-html/default/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 05:00:06 GMT -->

</html>
